<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('statistik_penduduks', function (Blueprint $table) {
            $table->id();
            
            // Kolom Kategori untuk membedakan jenis data (Agama, Pekerjaan, Umur, dll)
            $table->string('kategori'); 
            
            // Label Data (Contoh: "Islam", "Petani", "0-4 Tahun", "SD/Sederajat")
            $table->string('label');
            
            // Data Angka
            $table->integer('jumlah_laki')->default(0);
            $table->integer('jumlah_perempuan')->default(0);
            
            // Kolom Total (Opsional, jika ingin input total langsung tanpa rincian L/P)
            $table->integer('jumlah_total')->default(0);
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('statistik_penduduks');
    }
};