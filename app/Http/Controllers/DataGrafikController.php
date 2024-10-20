<?php

namespace App\Http\Controllers;

use App\Models\Kakao;
use App\Models\Kelapa;
use App\Models\Sawit;
use App\Models\Kopi;
use App\Models\Karet;
use App\Services\RegressionService;
use App\Services\SESService;
use Illuminate\Http\Request;

class DataGrafikController extends Controller
{
    protected $regressionService;
    protected $sesService;

    public function __construct(RegressionService $regressionService, SESService $sesService)
    {
        $this->regressionService = $regressionService;
        $this->sesService = $sesService;
    }

    public function index()
    {
        // Ambil data produksi berdasarkan lokasi untuk semua tanaman
        $dataKakao = Kakao::select('lokasi', 'produksi', 'periode')->get()->groupBy('lokasi');
        $dataKelapa = Kelapa::select('lokasi', 'produksi', 'periode')->get()->groupBy('lokasi');
        $dataSawit = Sawit::select('lokasi', 'produksi', 'periode')->get()->groupBy('lokasi');
        $dataKopi = Kopi::select('lokasi', 'produksi', 'periode')->get()->groupBy('lokasi');
        $dataKaret = Karet::select('lokasi', 'produksi', 'periode')->get()->groupBy('lokasi');

        // Mendapatkan prediksi regresi linear untuk semua tanaman
        $prediksiKakaoRegresi = $this->regressionService->prediksiKakao();
        $prediksiKelapaRegresi = $this->regressionService->prediksiKelapa();
        $prediksiSawitRegresi = $this->regressionService->prediksiSawit();
        $prediksiKopiRegresi = $this->regressionService->prediksiKopi();
        $prediksiKaretRegresi = $this->regressionService->prediksiKaret();

        // Mendapatkan prediksi SES untuk semua tanaman
        $prediksiKakaoSES = $this->sesService->prediksiKakao();
        $prediksiKelapaSES = $this->sesService->prediksiKelapa();
        $prediksiSawitSES = $this->sesService->prediksiSawit();
        $prediksiKopiSES = $this->sesService->prediksiKopi();
        $prediksiKaretSES = $this->sesService->prediksiKaret();

        // Mengirimkan data ke view
        return view('admin.grafik', [
            'dataKakao' => $dataKakao,
            'dataKelapa' => $dataKelapa,
            'dataSawit' => $dataSawit,
            'dataKopi' => $dataKopi,
            'dataKaret' => $dataKaret,
            'prediksiKakaoRegresi' => $prediksiKakaoRegresi,
            'prediksiKelapaRegresi' => $prediksiKelapaRegresi,
            'prediksiSawitRegresi' => $prediksiSawitRegresi,
            'prediksiKopiRegresi' => $prediksiKopiRegresi,
            'prediksiKaretRegresi' => $prediksiKaretRegresi,
            'prediksiKakaoSES' => $prediksiKakaoSES,
            'prediksiKelapaSES' => $prediksiKelapaSES,
            'prediksiSawitSES' => $prediksiSawitSES,
            'prediksiKopiSES' => $prediksiKopiSES,
            'prediksiKaretSES' => $prediksiKaretSES,
        ]);
        
    }
}
