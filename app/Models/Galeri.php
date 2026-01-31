<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    // Kolom mana saja yang boleh diisi oleh Admin
    protected $fillable = [
        'title',
        'category',
        'image',
        'description',
        'is_active',
    ];

    // Mengubah tipe data is_active menjadi boolean (true/false) secara otomatis
    protected $casts = [
        'is_active' => 'boolean',
    ];
}