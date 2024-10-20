<?php

namespace App\Exports;

use App\Models\Sawit;
use Maatwebsite\Excel\Concerns\FromCollection;

class SawitLimitedExport implements FromCollection
{
    public function collection()
    {
        return Sawit::limit(5)->get(); // Ambil 5 data untuk user biasa
    }
}
