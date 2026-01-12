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
        Schema::create('letter_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Warga
            $table->foreignId('letter_type_id')->constrained(); // Jenis Surat
            $table->enum('status', ['pending', 'processed', 'rejected', 'completed'])->default('pending');
            $table->json('data'); // Data isian warga (Nama, NIK, Keperluan) simpan disini
            $table->string('file_path')->nullable(); // Link file surat jadi (PDF/Docx)
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('letter_requests');
    }
};
