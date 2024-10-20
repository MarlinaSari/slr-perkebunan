<?php

namespace App\Models;

class DataProduksi
{
    // Method untuk mengambil data dari model yang berbeda
    public static function getAllDataProduksi()
    {
        // Ambil data dari model Kakao, Karet, Kopi, Kelapa, Sawit
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

        return $dataProduksi;
    }
}
