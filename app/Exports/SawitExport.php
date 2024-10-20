<?php

namespace App\Exports;

use App\Models\Sawit;
use Maatwebsite\Excel\Concerns\FromCollection;

class SawitExport implements FromCollection
{
    public function collection()
    {
        return Sawit::all(); // Ambil semua data untuk admin
    }
}

