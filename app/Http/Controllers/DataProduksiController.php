<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakao;
use App\Models\Karet;
use App\Models\Kopi;
use App\Models\Kelapa;
use App\Models\Sawit;

class DataProduksiController extends Controller
{
    public function index()
    {
        // Ambil data dari masing-masing model
        $kakaoData = Kakao::select('tahun', 'lokasi', 'periode', 'produksi')->get()->toArray();
        $karetData = Karet::select('tahun', 'lokasi', 'periode', 'produksi')->get()->toArray();
        $kopiData = Kopi::select('tahun', 'lokasi', 'periode', 'produksi')->get()->toArray();
        $kelapaData = Kelapa::select('tahun', 'lokasi', 'periode', 'produksi')->get()->toArray();
        $sawitData = Sawit::select('tahun', 'lokasi', 'periode', 'produksi')->get()->toArray();

        // Tambahkan jenis tanaman di setiap array
        foreach ($kakaoData as &$data) {
            $data['jenis_tanaman'] = 'Kakao';
        }
        foreach ($karetData as &$data) {
            $data['jenis_tanaman'] = 'Karet';
        }
        foreach ($kopiData as &$data) {
            $data['jenis_tanaman'] = 'Kopi';
        }
        foreach ($kelapaData as &$data) {
            $data['jenis_tanaman'] = 'Kelapa';
        }
        foreach ($sawitData as &$data) {
            $data['jenis_tanaman'] = 'Sawit';
        }

        // Gabungkan semua data
        $dataProduksi = array_merge($kakaoData, $karetData, $kopiData, $kelapaData, $sawitData);

        // Kirim data ke view
        return view('admin.data-produksi.index', compact(
            'dataProduksi',
            'kakaoData',
            'karetData',
            'kopiData',
            'kelapaData',
            'sawitData'
        ));
    }

    public function create()
    {
        $lokasi = [
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
    
        return view('admin.data-produksi.create', compact('lokasi'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'tahun' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'produksi' => 'required|numeric|min:0',
            'jenis_tanaman' => 'required|string',
        ]);

        // Simpan data ke model yang sesuai berdasarkan jenis tanaman
        switch ($validated['jenis_tanaman']) {
            case 'Kakao':
                Kakao::create($validated);
                break;
            case 'Karet':
                Karet::create($validated);
                break;
            case 'Kopi':
                Kopi::create($validated);
                break;
            case 'Kelapa':
                Kelapa::create($validated);
                break;
            case 'Sawit':
                Sawit::create($validated);
                break;
            default:
                return back()->withErrors(['jenis_tanaman' => 'Jenis tanaman tidak valid.']);
        }

        return redirect()->route('data-produksi.index')->with('success', 'Data produksi berhasil ditambahkan!');
    }
}
