<?php

namespace App\Exports;

use App\Models\Karet;
use Maatwebsite\Excel\Concerns\FromCollection;

class KaretLimitedExport implements FromCollection
{
    public function collection()
    {
        return Karet::limit(5)->get(); // Ambil 5 data untuk user biasa
    }
}
