<?php

namespace App\Exports;

use App\Models\Kakao;
use Maatwebsite\Excel\Concerns\FromCollection;

class KakaoExport implements FromCollection
{
    public function collection()
    {
        return Kakao::all(); // Ambil semua data untuk admin
    }
}

