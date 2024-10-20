<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karet extends Model
{
    use HasFactory;
    protected $table = 'karets'; // Sesuaikan dengan nama tabel Anda
    protected $fillable = ['lokasi', 'tahun', 'periode', 'produksi','alpha'];
    public $timestamps = false; // Nonaktifkan timestamps
}
