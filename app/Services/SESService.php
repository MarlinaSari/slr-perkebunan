<?php

namespace App\Services;

use App\Models\Kakao;
use App\Models\Sawit;
use App\Models\Karet;
use App\Models\Kelapa;
use App\Models\Kopi;

class SESService
{
    public function prediksiKakao($alpha = 0.2)
    {
        return $this->calculateKakaoSES($alpha);
    }
    public function prediksiKelapa($alpha = 0.2)
    {
        return $this->calculateKelapaSES($alpha);
    }
    public function prediksiSawit($alpha = 0.2)
    {
        return $this->calculateSawitSES($alpha);
    }
    public function prediksiKopi($alpha = 0.2)
    {
        return $this->calculateKopiSES($alpha);
    }
    public function prediksiKaret($alpha = 0.2)
    {
        return $this->calculateKaretSES($alpha);
    }
    //==PERHITUNGAN SES KAKAO==//
    public function calculateKakaoSES($alpha = 0.2)
    {
        $locations = Kakao::select('lokasi')->distinct()->get();
        $kakao = [];

        foreach ($locations as $location) {
            $data = Kakao::where('lokasi', $location->lokasi)->orderBy('periode')->get();

            $n = count($data);
            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi level dengan nilai pertama
            $level = $data[0]->produksi;
            $ses = []; // Untuk menyimpan hasil SES
            $totalAPE = 0;

            // Hitung SES
            foreach ($data as $i => $row) {
                $currentData = $row->produksi;

                // Hitung prediksi untuk data selanjutnya
                if ($i > 0) {
                    $predictedY = $level; // Prediksi adalah level saat ini
                    $ses[] = $predictedY; // Simpan prediksi untuk analisis

                    // Hitung APE
                    $APE = ($currentData != 0) ? abs(($currentData - $predictedY) / $currentData) * 100 : 0;
                    $totalAPE += $APE;

                    // Pembaruan level
                    $level = $alpha * $currentData + (1 - $alpha) * $level;
                } else {
                    $ses[] = $currentData; // Untuk periode pertama, prediksikan data aktual
                }
            }

            // Hitung MAPE
            $kakao[$location->lokasi]['MAPE'] = $totalAPE / ($n - 1); // Rata-rata dari APE

            // Simpan prediksi
            $kakao[$location->lokasi]['predictions'] = [];
            foreach ($data as $i => $row) {
                $kakao[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $row->produksi,
                    'predictedY' => $ses[$i],
                    'APE' => isset($row->produksi) ? abs(($row->produksi - $ses[$i]) / $row->produksi) * 100 : 0,
                ];
            }
        }

        return $kakao;
    }

    //==PERHITUNGAN SES SAWIT==//
    public function calculateSawitSES($alpha = 0.2)
    {
        $locations = Sawit::select('lokasi')->distinct()->get();
        $sawit = [];

        foreach ($locations as $location) {
            $data = Sawit::where('lokasi', $location->lokasi)->orderBy('periode')->get();

            $n = count($data);
            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi level dengan nilai pertama
            $level = $data[0]->produksi;
            $ses = []; // Untuk menyimpan hasil SES
            $totalAPE = 0;

            // Hitung SES
            foreach ($data as $i => $row) {
                $currentData = $row->produksi;

                // Hitung prediksi untuk data selanjutnya
                if ($i > 0) {
                    $predictedY = $level; // Prediksi adalah level saat ini
                    $ses[] = $predictedY; // Simpan prediksi untuk analisis

                    // Hitung APE
                    $APE = ($currentData != 0) ? abs(($currentData - $predictedY) / $currentData) * 100 : 0;
                    $totalAPE += $APE;

                    // Pembaruan level
                    $level = $alpha * $currentData + (1 - $alpha) * $level;
                } else {
                    $ses[] = $currentData; // Untuk periode pertama, prediksikan data aktual
                }
            }

            // Hitung MAPE
            $sawit[$location->lokasi]['MAPE'] = $totalAPE / ($n - 1); // Rata-rata dari APE

            // Simpan prediksi
            $sawit[$location->lokasi]['predictions'] = [];
            foreach ($data as $i => $row) {
                $sawit[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $row->produksi,
                    'predictedY' => $ses[$i],
                    'APE' => isset($row->produksi) ? abs(($row->produksi - $ses[$i]) / $row->produksi) * 100 : 0,
                ];
            }
        }

        return $sawit;
    }

    //==PERHITUNGAN SES KARET==//
    public function calculateKaretSES($alpha = 0.2)
    {
        $locations = Karet::select('lokasi')->distinct()->get();
        $karet = [];

        foreach ($locations as $location) {
            $data = Karet::where('lokasi', $location->lokasi)->orderBy('periode')->get();

            $n = count($data);
            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi level dengan nilai pertama
            $level = $data[0]->produksi;
            $ses = []; // Untuk menyimpan hasil SES
            $totalAPE = 0;

            // Hitung SES
            foreach ($data as $i => $row) {
                $currentData = $row->produksi;

                // Hitung prediksi untuk data selanjutnya
                if ($i > 0) {
                    $predictedY = $level; // Prediksi adalah level saat ini
                    $ses[] = $predictedY; // Simpan prediksi untuk analisis

                    // Hitung APE
                    $APE = ($currentData != 0) ? abs(($currentData - $predictedY) / $currentData) * 100 : 0;
                    $totalAPE += $APE;

                    // Pembaruan level
                    $level = $alpha * $currentData + (1 - $alpha) * $level;
                } else {
                    $ses[] = $currentData; // Untuk periode pertama, prediksikan data aktual
                }
            }

            // Hitung MAPE
            $karet[$location->lokasi]['MAPE'] = $totalAPE / ($n - 1); // Rata-rata dari APE

            // Simpan prediksi
            $karet[$location->lokasi]['predictions'] = [];
            foreach ($data as $i => $row) {
                $karet[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $row->produksi,
                    'predictedY' => $ses[$i],
                    'APE' => isset($row->produksi) ? abs(($row->produksi - $ses[$i]) / $row->produksi) * 100 : 0,
                ];
            }
        }

        return $karet;
    }

    //==PERHITUNGAN SES KELAPA==//
    public function calculateKelapaSES($alpha = 0.2)
    {
        $locations = Kelapa::select('lokasi')->distinct()->get();
        $kelapa = [];

        foreach ($locations as $location) {
            $data = Kelapa::where('lokasi', $location->lokasi)->orderBy('periode')->get();

            $n = count($data);
            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi level dengan nilai pertama
            $level = $data[0]->produksi;
            $ses = []; // Untuk menyimpan hasil SES
            $totalAPE = 0;

            // Hitung SES
            foreach ($data as $i => $row) {
                $currentData = $row->produksi;

                // Hitung prediksi untuk data selanjutnya
                if ($i > 0) {
                    $predictedY = $level; // Prediksi adalah level saat ini
                    $ses[] = $predictedY; // Simpan prediksi untuk analisis

                    // Hitung APE
                    $APE = ($currentData != 0) ? abs(($currentData - $predictedY) / $currentData) * 100 : 0;
                    $totalAPE += $APE;

                    // Pembaruan level
                    $level = $alpha * $currentData + (1 - $alpha) * $level;
                } else {
                    $ses[] = $currentData; // Untuk periode pertama, prediksikan data aktual
                }
            }

            // Hitung MAPE
            if ($n > 1) {
                $kelapa[$location->lokasi]['MAPE'] = $totalAPE / ($n - 1); // Rata-rata dari APE
            } else {
                $kelapa[$location->lokasi]['MAPE'] = 0; // Atur MAPE sebagai 0 jika hanya ada satu data
            }
            // Simpan prediksi
            $kelapa[$location->lokasi]['predictions'] = [];
            foreach ($data as $i => $row) {
                $kelapa[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $row->produksi,
                    'predictedY' => $ses[$i],
                    'APE' => ($row->produksi != 0 && isset($ses[$i])) ? abs(($row->produksi - $ses[$i]) / $row->produksi) * 100 : 0,
                ];
            }
        }

        return $kelapa;
    }

    //==PERHITUNGAN SES KOPI==//
    public function calculateKopiSES($alpha = 0.2)
    {
        $locations = Kopi::select('lokasi')->distinct()->get();
        $kopi = [];

        foreach ($locations as $location) {
            $data = Kopi::where('lokasi', $location->lokasi)->orderBy('periode')->get();

            $n = count($data);
            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi level dengan nilai pertama
            $level = $data[0]->produksi;
            $ses = []; // Untuk menyimpan hasil SES
            $totalAPE = 0;

            // Hitung SES
            foreach ($data as $i => $row) {
                $currentData = $row->produksi;

                // Hitung prediksi untuk data selanjutnya
                if ($i > 0) {
                    $predictedY = $level; // Prediksi adalah level saat ini
                    $ses[] = $predictedY; // Simpan prediksi untuk analisis

                    // Hitung APE
                    $APE = ($currentData != 0) ? abs(($currentData - $predictedY) / $currentData) * 100 : 0;
                    $totalAPE += $APE;

                    // Pembaruan level
                    $level = $alpha * $currentData + (1 - $alpha) * $level;
                } else {
                    $ses[] = $currentData; // Untuk periode pertama, prediksikan data aktual
                }
            }

            // Hitung MAPE
            if ($n > 1) {
                $kopi[$location->lokasi]['MAPE'] = $totalAPE / ($n - 1); // Rata-rata dari APE
            } else {
                $kopi[$location->lokasi]['MAPE'] = 0; // Atur MAPE sebagai 0 jika hanya ada satu data
            }
            // Simpan prediksi
            $kopi[$location->lokasi]['predictions'] = [];
            foreach ($data as $i => $row) {
                $kopi[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $row->produksi,
                    'predictedY' => $ses[$i],
                    'APE' => ($row->produksi != 0 && isset($ses[$i])) ? abs(($row->produksi - $ses[$i]) / $row->produksi) * 100 : 0,
                ];
            }
        }

        return $kopi;
    }
}

