<?php

namespace App\Http\Controllers;

use App\Models\Kelapa;
use App\Services\RegressionService;
use App\Services\SESService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exports\KelapaExport;
use App\Exports\KelapaLimitedExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;


class KelapaController extends Controller
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

        $kelapaData = Kelapa::all(); 
        
        // Menghitung regresi
        $regressionData = $this->regressionService->calculateRegression();
        $kelapaRegression = $regressionData['kelapa'];

        // Menghitung SES dengan Alpha dari input
        $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
        $kelapaSES = $this->sesService->calculateKelapaSES($alpha); // Gunakan Alpha hanya untuk SES

        return view('pages.kelapa-index', compact('kelapaRegression', 'kelapaSES', 'kecamatan'));
    }

    public function store(Request $request)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kelapa.index')->with('error', 'Anda tidak memiliki akses untuk menambah data.');
        }

        // Validasi input
        $this->validate($request, [
            'lokasi' => 'required|string',
            'tahun' => 'required|integer',
            'periode' => 'required|string',
            'produksi' => 'required|numeric',
            'alpha' => 'required|numeric|min:0|max:1', // Sesuaikan nama dengan input di form
        ]);

        // Simpan data kelapa
        Kelapa::create([
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'produksi' => number_format($request->produksi, 2, '.', ''),
            'alpha_ses' => $request->alpha, // Simpan Alpha SES
        ]);

        return redirect()->route('kelapa.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kelapa.index')->with('error', 'Anda tidak memiliki akses untuk mengedit data.');
        }

        $kelapa = Kelapa::findOrFail($id);
        return view('pages.kelapa-edit', compact('kelapa'));
    }

    public function update(Request $request, $id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kelapa.index')->with('error', 'Anda tidak memiliki akses untuk memperbarui data.');
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
        $kelapa = Kelapa::findOrFail($id);
        $kelapa->update([
            'lokasi' => $request->lokasi,
            'tahun' => $request->tahun,
            'periode' => $request->periode,
            'produksi' => number_format($request->produksi, 2, '.', ''),
            'alpha_ses' => $request->alpha, // Update Alpha SES
        ]);

        return redirect()->route('kelapa.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cek apakah pengguna adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('kelapa.index')->with('error', 'Anda tidak memiliki akses untuk menghapus data.');
        }

        // Temukan data berdasarkan ID
        $kelapa = Kelapa::findOrFail($id);
        // Hapus data kelapa
        $kelapa->delete();

        return redirect()->route('kelapa.index')->with('success', 'Data berhasil dihapus!');
    }

    public function grafik()
{
    // Ambil data kelapa dari database
    $dataKelapa = Kelapa::all();

    // Dapatkan periode, produksi, dan prediksi
    $labels = $dataKelapa->pluck('tahun')->toArray();
    $produksi = $dataKelapa->pluck('produksi')->toArray();

    // Dapatkan prediksi
    $prediksiRegresi = $this->regressionService->predict($dataKelapa);
    $prediksiSES = $this->sesService->predict($dataKelapa);

    // Cek apakah prediksi terisi
    if (empty($prediksiRegresi) || empty($prediksiSES)) {
        return redirect()->route('kelapa.index')->with('error', 'Prediksi tidak tersedia.');
    }

    // Kirim data ke view
    return view('admin.grafik', compact('labels', 'produksi', 'prediksiRegresi', 'prediksiSES'));
}

public function exportPdf(Request $request)
{
    $regressionData = $this->regressionService->calculateRegression();
    $kelapaRegression = $regressionData['kelapa'];
    $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
    $kelapaSES = $this->sesService->calculateKelapaSES($alpha); // Gunakan Alpha hanya untuk SES

    $pdf = PDF::loadView('admin.kelapa-pdf', compact('kelapaRegression', 'kelapaSES'));

    return $pdf->download('hasil-prediksi-kelapa.pdf');
}

public function exportCsv(Request $request)
{
    $regressionData = $this->regressionService->calculateRegression();
    $kelapaRegression = $regressionData['kelapa'];
    $alpha = $request->input('alpha', 0.2); // Ambil Alpha dari input form (default 0.2)
    $kelapaSES = $this->sesService->calculateKelapaSES($alpha); // Gunakan Alpha hanya untuk SES

    $csvData = [];
    
    // Tambahkan data regresi linear ke CSV
    foreach ($kelapaRegression as $location => $data) {
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
    foreach ($kelapaSES as $location => $data) {
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
    $fileName = 'hasil-prediksi-kelapa.csv';
    $handle = fopen($fileName, 'w');
    fputcsv($handle, ['Lokasi', 'Model', 'Periode', 'Produksi Aktual', 'Produksi Prediksi', 'APE (%)']);
    foreach ($csvData as $row) {
        fputcsv($handle, $row);
    }
    fclose($handle);

    return response()->download($fileName)->deleteFileAfterSend(true);
}

}