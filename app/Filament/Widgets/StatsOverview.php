<?php

namespace App\Filament\Widgets;

// Ganti LetterType dengan Galeri karena LetterType sudah dihapus
use App\Models\Galeri; 
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        return [
            // Statistik 1: Mengambil data Real dari Tabel Galeri
            Stat::make('Total Galeri', Galeri::count())
                ->description('Foto kegiatan yang diupload')
                ->descriptionIcon('heroicon-m-photo')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),

            // Statistik 2: Placeholder (Nanti bisa diganti Potensi Desa)
            Stat::make('Potensi Desa', '-') 
                ->description('Data belum tersedia')
                ->descriptionIcon('heroicon-m-star')
                ->color('gray'),

            // Statistik 3: Placeholder (Nanti bisa diganti Berita)
            Stat::make('Berita / Artikel', '-')
                ->description('Data belum tersedia')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('gray'),
        ];
    }
}