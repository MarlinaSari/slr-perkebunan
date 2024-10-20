<?php

namespace App\Exports;

use App\Models\Karet;
use Maatwebsite\Excel\Concerns\FromCollection;

class KakaoExport implements FromCollection
{
    public function collection()
    {
        return Karet::all(); // Ambil semua data untuk admin
    }
}

