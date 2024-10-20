<?php

namespace App\Exports;

use App\Models\Kelapa;
use Maatwebsite\Excel\Concerns\FromCollection;

class KelapaLimitedExport implements FromCollection
{
    public function collection()
    {
        return Kelapa::limit(5)->get(); // Ambil 5 data untuk user biasa
    }
}
