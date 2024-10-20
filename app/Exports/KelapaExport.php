<?php

namespace App\Exports;

use App\Models\Kelapa;
use Maatwebsite\Excel\Concerns\FromCollection;

class Kelapaxport implements FromCollection
{
    public function collection()
    {
        return Kelapa::all(); // Ambil semua data untuk admin
    }
}

