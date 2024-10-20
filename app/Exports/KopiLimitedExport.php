<?php

namespace App\Exports;

use App\Models\Kopi;
use Maatwebsite\Excel\Concerns\FromCollection;

class KopiLimitedExport implements FromCollection
{
    public function collection()
    {
        return Kopi::limit(5)->get(); // Ambil 5 data untuk user biasa
    }
}
