<?php

namespace App\Http\Controllers;

use App\Models\Kopi;
use App\Services\RegressionService;
use App\Services\SESService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\KopiExport;
use App\Exports\KopiLimitedExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class KopiController extends Controller
{
    protected $regressionService;
    protected $sesService;

    public function __construct(RegressionService $regressionService, SESService $sesService)
    {
        $this->regressionService = $regressionService;
        $this->sesService = $sesService;
    }

    public function index(Request $request)
    {
        $kecamatan = [
            'Johan Pahlawan',
            'Samatiga',
            'Bubon',
            'Arongan Lambalek',
            'Woyla',
            'Woyla Barat',
            'Woyla Timur',
            'Kaway XVI',
            'Meureubo',
            'Pante Ceureumen',
            'Panton Reu',
            'Sungai Mas',
        ];

        $kopiData = Kopi::all(); 
        
        // Menghitung regresi
        $regressionData = $this->regressionService->calculateRegression();
        $kopiRegression = $regressionData['kopi'];

        // Menghitung SES dengan Alpha dari input
        $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
        $kopiSES = $this->sesService->calculateKopiSES($alpha); // Gunakan Alpha hanya untuk SES

        return view('pages.kopi-index', compact('kopiRegression', 'kopiSES', 'kecamatan'));
    }

    public function store(Request $request)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kopi.index')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }

        // Validasi input
        $this->validate($request, [
            'lokasi' => 'required|string',
            'tahun' => 'required|integer',
            'periode' => 'required|string',
            'produksi' => 'required|numeric',
            'alpha' => 'required|numeric|min:0|max:1', // Sesuaikan nama dengan input di form
        ]);

        // Simpan data kopi
        Kopi::create([
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'produksi' => number_format($request->produksi, 2, '.', ''),
            'alpha_ses' => $request->alpha, // Simpan Alpha SES
        ]);

        return redirect()->route('kopi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kopi.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data.');
        }

        $kopi = Kopi::findOrFail($id);
        return view('pages.kopi-edit', compact('kopi'));
    }

    public function update(Request $request, $id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kopi.index')->with('error', 'Anda tidak memiliki akses untuk memperbarui data.');
        }

        // Validasi input
        $this->validate($request, [
            'lokasi' => 'required|string',
            'tahun' => 'required|integer',
            'periode' => 'required|string',
            'produksi' => 'required|numeric',
            'alpha_ses' => 'required|numeric|min:0|max:1', // Sesuaikan nama dengan input di form
        ]);

        // Temukan dan perbarui data
        $kopi = Kopi::findOrFail($id);
        $kopi->update([
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'produksi' => number_format($request->produksi, 2, '.', ''),
            'alpha_ses' => $request->alpha, // Update Alpha SES
        ]);

        return redirect()->route('kopi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kopi.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        // Temukan data berdasarkan ID
        $kopi = Kopi::findOrFail($id);
        // Hapus data kopi
        $kopi->delete();

        return redirect()->route('kopi.index')->with('success', 'Data berhasil dihapus!');
    }

    public function grafik()
{
    // Ambil data kopi dari database
    $dataKopi = Kopi::all();

    // Dapatkan periode, produksi, dan prediksi
    $labels = $dataKopi->pluck('tahun')->toArray();
    $produksi = $dataKopi->pluck('produksi')->toArray();

    // Dapatkan prediksi
    $prediksiRegresi = $this->regressionService->predict($dataKopi);
    $prediksiSES = $this->sesService->predict($dataKopi);

    // Cek apakah prediksi terisi
    if (empty($prediksiRegresi) || empty($prediksiSES)) {
        return redirect()->route('kopi.index')->with('error', 'Prediksi tidak tersedia.');
    }

    // Kirim data ke view
    return view('admin.grafik', compact('labels', 'produksi', 'prediksiRegresi', 'prediksiSES'));
}

public function exportPdf(Request $request)
{
    $regressionData = $this->regressionService->calculateRegression();
    $kopiRegression = $regressionData['kopi'];
    $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
    $kopiSES = $this->sesService->calculateKopiSES($alpha); // Gunakan Alpha hanya untuk SES

    $pdf = PDF::loadView('admin.kopi-pdf', compact('kopiRegression', 'kopiSES'));

    return $pdf->download('hasil-prediksi-kopi.pdf');
}

public function exportCsv(Request $request)
{
    $regressionData = $this->regressionService->calculateRegression();
    $kopiRegression = $regressionData['kopi'];
    $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
    $kopiSES = $this->sesService->calculateKopiSES($alpha); // Gunakan Alpha hanya untuk SES

    $csvData = [];
    
    // Tambahkan data regresi linear ke CSV
    foreach ($kopiRegression as $location => $data) {
        foreach ($data['predictions'] as $prediction) {
            $csvData[] = [
                'Lokasi' => $location,
                'Model' => 'Regresi Linear',
                'Periode' => $prediction['periode'],
                'Produksi Aktual' => $prediction['produksi'],
                'Produksi Prediksi' => $prediction['predictedY'],
                'APE (%)' => $prediction['APE'],
            ];
        }
    }

    // Tambahkan data SES ke CSV
    foreach ($kopiSES as $location => $data) {
        foreach ($data['predictions'] as $prediction) {
            $csvData[] = [
                'Lokasi' => $location,
                'Model' => 'SES',
                'Periode' => $prediction['periode'],
                'Produksi Aktual' => $prediction['produksi'],
                'Produksi Prediksi' => $prediction['predictedY'],
                'APE (%)' => $prediction['APE'],
            ];
        }
    }

    // Membuat CSV dari array
    $fileName = 'hasil-prediksi-kopi.csv';
    $handle = fopen($fileName, 'w');
    fputcsv($handle, ['Lokasi', 'Model', 'Periode', 'Produksi Aktual', 'Produksi Prediksi', 'APE (%)']);
    foreach ($csvData as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);

    return response()->download($fileName)->deleteFileAfterSend(true);
}

}