<?php

namespace App\Services;

use App\Models\Kakao;
use App\Models\Sawit;
use App\Models\Karet;
use App\Models\Kelapa;
use App\Models\Kopi;

class RegressionService
{
    public function calculateRegression()
    {
        $kakaoData = $this->calculateKakaoRegression();
        $sawitData = $this->calculateSawitRegression();
        $karetData = $this->calculateKaretRegression();
        $kelapaData = $this->calculateKelapaRegression();
        $kopiData = $this->calculateKopiRegression();

        return [
            'kakao' => $kakaoData,
            'sawit' => $sawitData,
            'karet' => $karetData,
            'kelapa' => $kelapaData,
            'kopi'   =>$kopiData,
        ];
    }

    public function prediksiKakao()
    {
        return $this->calculateKakaoRegression();
    }
    public function prediksiSawit()
    {
        return $this->calculateSawitRegression();
    }
    public function prediksiKopi()
    {
        return $this->calculateKopiRegression();
    }
    public function prediksiKaret()
    {
        return $this->calculateKaretRegression();
    }
    public function prediksiKelapa()
    {
        return $this->calculateKelapaRegression();
    }

    //==PERHITUNGAN REGRESI UNTUK KAKAO==//
    private function calculateKakaoRegression()
    {
        $locations = Kakao::select('lokasi')->distinct()->get();
        $kakao = [];

        foreach ($locations as $location) {
            $data = Kakao::where('lokasi', $location->lokasi)->orderBy('periode')->get();
            $n = count($data);

            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi variabel
            $sumX = 0;
            $sumY = 0;
            $sumXY = 0;
            $sumX2 = 0;

            foreach ($data as $row) {
                $x = $row->periode; // Periode
                $y = $row->produksi; // Produksi
                $sumX += $x;
                $sumY += $y;
                $sumXY += $x * $y;
                $sumX2 += $x * $x;
            }

            // Hitung nilai a (intercept) dan b (slope)
            $b = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $a = ($sumY - $b * $sumX) / $n;

            // Simpan hasil
            $kakao[$location->lokasi]['a'] = $a;
            $kakao[$location->lokasi]['b'] = $b;

            // Hitung prediksi dan MAPE
            $totalAPE = 0;

            foreach ($data as $row) {
                $predictedY = $a + $b * $row->periode;
                $actualY = $row->produksi;
                $APE = ($actualY != 0) ? abs(($actualY - $predictedY) / $actualY) * 100 : 0;
                $totalAPE += $APE;

                // Simpan hasil prediksi
                $kakao[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $actualY,
                    'predictedY' => $predictedY,
                    'APE' => $APE,
                ];
            }

            // Hitung MAPE
            $kakao[$location->lokasi]['MAPE'] = $totalAPE / $n; // Rata-rata dari APE
        }

        return $kakao;
    }

    //==PERHITUNGAN REGRESI UNTUK SAWIT==//
    private function calculateSawitRegression()
    {
        $locations = Sawit::select('lokasi')->distinct()->get();
        $sawit = [];

        foreach ($locations as $location) {
            $data = Sawit::where('lokasi', $location->lokasi)->orderBy('periode')->get();
            $n = count($data);

            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi variabel
            $sumX = 0;
            $sumY = 0;
            $sumXY = 0;
            $sumX2 = 0;

            foreach ($data as $row) {
                $x = $row->periode; // Periode
                $y = $row->produksi; // Produksi
                $sumX += $x;
                $sumY += $y;
                $sumXY += $x * $y;
                $sumX2 += $x * $x;
            }

            // Hitung nilai a (intercept) dan b (slope)
            $b = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $a = ($sumY - $b * $sumX) / $n;

            // Simpan hasil
            $sawit[$location->lokasi]['a'] = $a;
            $sawit[$location->lokasi]['b'] = $b;

            // Hitung prediksi dan MAPE
            $totalAPE = 0;

            foreach ($data as $row) {
                $predictedY = $a + $b * $row->periode;
                $actualY = $row->produksi;
                $APE = ($actualY != 0) ? abs(($actualY - $predictedY) / $actualY) * 100 : 0;
                $totalAPE += $APE;

                // Simpan hasil prediksi
                $sawit[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $actualY,
                    'predictedY' => $predictedY,
                    'APE' => $APE,
                ];
            }

            // Hitung MAPE
            $sawit[$location->lokasi]['MAPE'] = $totalAPE / $n; // Rata-rata dari APE
        }

        return $sawit;
    }

    //==PERHITUNGAN REGRESI UNTUK KARET==//
    private function calculateKaretRegression()
    {
        $locations = Karet::select('lokasi')->distinct()->get();
        $karet = [];

        foreach ($locations as $location) {
            $data = Karet::where('lokasi', $location->lokasi)->orderBy('periode')->get();
            $n = count($data);

            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi variabel
            $sumX = 0;
            $sumY = 0;
            $sumXY = 0;
            $sumX2 = 0;

            foreach ($data as $row) {
                $x = $row->periode; // Periode
                $y = $row->produksi; // Produksi
                $sumX += $x;
                $sumY += $y;
                $sumXY += $x * $y;
                $sumX2 += $x * $x;
            }

            // Hitung nilai a (intercept) dan b (slope)
            $b = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $a = ($sumY - $b * $sumX) / $n;

            // Simpan hasil
            $karet[$location->lokasi]['a'] = $a;
            $karet[$location->lokasi]['b'] = $b;

            // Hitung prediksi dan MAPE
            $totalAPE = 0;

            foreach ($data as $row) {
                $predictedY = $a + $b * $row->periode;
                $actualY = $row->produksi;
                $APE = ($actualY != 0) ? abs(($actualY - $predictedY) / $actualY) * 100 : 0;
                $totalAPE += $APE;

                // Simpan hasil prediksi
                $karet[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $actualY,
                    'predictedY' => $predictedY,
                    'APE' => $APE,
                ];
            }

            // Hitung MAPE
            $karet[$location->lokasi]['MAPE'] = $totalAPE / $n; // Rata-rata dari APE
        }

        return $karet;
    }

        //==PERHITUNGAN REGRESI UNTUK KELAPA==//
    private function calculateKelapaRegression()
    {
        $locations = Kelapa::select('lokasi')->distinct()->get();
        $kelapa = [];

        foreach ($locations as $location) {
            $data = Kelapa::where('lokasi', $location->lokasi)->orderBy('periode')->get();
            $n = count($data);

            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi variabel
            $sumX = 0;
            $sumY = 0;
            $sumXY = 0;
            $sumX2 = 0;

            foreach ($data as $row) {
                $x = $row->periode; // Periode
                $y = $row->produksi; // Produksi
                $sumX += $x;
                $sumY += $y;
                $sumXY += $x * $y;
                $sumX2 += $x * $x;
            }

            // Hitung nilai a (intercept) dan b (slope)
            $b = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $a = ($sumY - $b * $sumX) / $n;

            // Simpan hasil
            $kelapa[$location->lokasi]['a'] = $a;
            $kelapa[$location->lokasi]['b'] = $b;

            // Hitung prediksi dan MAPE
            $totalAPE = 0;

            foreach ($data as $row) {
                $predictedY = $a + $b * $row->periode;
                $actualY = $row->produksi;
                $APE = ($actualY != 0) ? abs(($actualY - $predictedY) / $actualY) * 100 : 0;
                $totalAPE += $APE;

                // Simpan hasil prediksi
                $kelapa[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $actualY,
                    'predictedY' => $predictedY,
                    'APE' => $APE,
                ];
            }

            // Hitung MAPE
            $kelapa[$location->lokasi]['MAPE'] = $totalAPE / $n; // Rata-rata dari APE
        }

        return $kelapa;
    }

    //==PERHITUNGAN REGRESI UNTUK KOPI==//
    private function calculateKopiRegression()
    {
        $locations = Kopi::select('lokasi')->distinct()->get();
        $kopi = [];

        foreach ($locations as $location) {
            $data = Kopi::where('lokasi', $location->lokasi)->orderBy('periode')->get();
            $n = count($data);

            if ($n == 0) continue; // Jika tidak ada data

            // Inisialisasi variabel
            $sumX = 0;
            $sumY = 0;
            $sumXY = 0;
            $sumX2 = 0;

            foreach ($data as $row) {
                $x = $row->periode; // Periode
                $y = $row->produksi; // Produksi
                $sumX += $x;
                $sumY += $y;
                $sumXY += $x * $y;
                $sumX2 += $x * $x;
            }

            // Hitung nilai a (intercept) dan b (slope)
            $b = ($n * $sumXY - $sumX * $sumY) / ($n * $sumX2 - $sumX * $sumX);
            $a = ($sumY - $b * $sumX) / $n;

            // Simpan hasil
            $kopi[$location->lokasi]['a'] = $a;
            $kopi[$location->lokasi]['b'] = $b;

            // Hitung prediksi dan MAPE
            $totalAPE = 0;

            foreach ($data as $row) {
                $predictedY = $a + $b * $row->periode;
                $actualY = $row->produksi;
                $APE = ($actualY != 0) ? abs(($actualY - $predictedY) / $actualY) * 100 : 0;
                $totalAPE += $APE;

                // Simpan hasil prediksi
                $kopi[$location->lokasi]['predictions'][] = [
                    'periode' => $row->periode,
                    'produksi' => $actualY,
                    'predictedY' => $predictedY,
                    'APE' => $APE,
                ];
            }

            // Hitung MAPE
            $kopi[$location->lokasi]['MAPE'] = $totalAPE / $n; // Rata-rata dari APE
        }

        return $kopi;
    }

}
