<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kopis', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi')->comment('Nama lokasi produksi kopi');
            $table->integer('tahun')->comment('Tahun produksi kopi');
            $table->string('periode')->comment('Periode produksi (bulan atau format lainnya)');
            $table->double('produksi')->comment('Jumlah produksi dalam ton');
            $table->float('alpha')->nullable()->comment('Nilai alpha untuk peramalan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kopis');
    }
};
