<?php

namespace App\Exports;

use App\Models\Kopi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KopiExport implements FromCollection
{
    public function collection()
    {
        return Kopi::all(); // Ambil semua data untuk admin
    }
}

