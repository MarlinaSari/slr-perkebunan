<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kakao;
use App\Models\Sawit;
use App\Models\Karet;
use App\Models\Kelapa;
use App\Models\Kopi;

class DashboardController extends Controller
{
    // Metode untuk dashboard admin
    public function admin()
    {
        // Ambil semua data dari model-model yang diperlukan
        $kakaoData = Kakao::all();
        $sawitData = Sawit::all();
        $karetData = Karet::all();
        $kelapaData = Kelapa::all();
        $kopiData = Kopi::all();

        // Hitung total jumlah data dari semua model
        $totalData = $kakaoData->count() + $sawitData->count() + $karetData->count() + $kelapaData->count() + $kopiData->count();

        // Hitung Total Tanaman (jumlah data dari masing-masing tanaman)
        $totalTanaman = [
            'Kakao' => $kakaoData->count(),
            'Sawit' => $sawitData->count(),
            'Karet' => $karetData->count(),
            'Kelapa' => $kelapaData->count(),
            'Kopi' => $kopiData->count(),
        ];
        
        // Lokasi di-set statis, misalnya 12
        $totalLokasi = 12;

        // Kirim data ke view sebagai variabel
        return view('admin.dashboard', [
            'totalData' => $totalData,
            'totalLokasi' => $totalLokasi, // Tetapkan nilai tetap 12 untuk lokasi
            'totalTanaman' => $totalTanaman,
        ]);
    }

    // Metode untuk dashboard user
    public function index()
    {
        // Ambil semua data dari model-model yang diperlukan
        $kakaoData = Kakao::all();
        $sawitData = Sawit::all();
        $karetData = Karet::all();
        $kelapaData = Kelapa::all();
        $kopiData = Kopi::all();

        // Hitung total jumlah data dari semua model
        $totalData = $kakaoData->count() + $sawitData->count() + $karetData->count() + $kelapaData->count() + $kopiData->count();

        // Hitung Total Tanaman (jumlah data dari masing-masing tanaman)
        $totalTanaman = [
            'Kakao' => $kakaoData->count(),
            'Sawit' => $sawitData->count(),
            'Karet' => $karetData->count(),
            'Kelapa' => $kelapaData->count(),
            'Kopi' => $kopiData->count(),
        ];
        
        // Lokasi di-set statis, misalnya 12
        $totalLokasi = 12;

        // Kirim data ke view sebagai variabel
        return view('user.dashboard', [
            'totalData' => $totalData,
            'totalLokasi' => $totalLokasi, // Tetapkan nilai tetap 12 untuk lokasi
            'totalTanaman' => $totalTanaman,
        ]);
    }
}
