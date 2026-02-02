<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikPenduduk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori',
        'label',
        'jumlah_laki',
        'jumlah_perempuan',
        'jumlah_total',
    ];

    // Event otomatis: Saat disimpan, hitung Total jika user tidak mengisinya manual
    protected static function booted()
    {
        static::saving(function ($model) {
            // Jika total 0 tapi ada rincian L/P, maka jumlahkan otomatis
            if ($model->jumlah_total == 0) {
                $model->jumlah_total = $model->jumlah_laki + $model->jumlah_perempuan;
            }
        });
    }
}