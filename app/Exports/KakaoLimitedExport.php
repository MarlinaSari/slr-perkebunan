<?php

namespace App\Exports;

use App\Models\Kakao;
use Maatwebsite\Excel\Concerns\FromCollection;

class KakaoLimitedExport implements FromCollection
{
    public function collection()
    {
        return Kakao::limit(5)->get(); // Ambil 5 data untuk user biasa
    }
}
