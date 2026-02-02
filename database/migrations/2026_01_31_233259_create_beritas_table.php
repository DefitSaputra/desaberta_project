<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul Berita
            $table->string('slug')->unique(); // Link URL (harus unik)
            $table->string('thumbnail')->nullable(); // Foto Sampul
            $table->longText('content'); // Isi Berita (Panjang)
            $table->boolean('is_published')->default(false); // Status Tayang
            $table->date('published_at')->nullable(); // Tanggal Terbit
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};