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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Foto
            $table->string('category'); // Kategori (Misal: Kegiatan, Alam, Pembangunan)
            $table->string('image'); // Lokasi file gambar tersimpan
            $table->text('description')->nullable(); // Deskripsi (Opsional/Boleh kosong)
            $table->boolean('is_active')->default(true); // Status tayang (Aktif/Tidak)
            $table->timestamps(); // Created_at & Updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};