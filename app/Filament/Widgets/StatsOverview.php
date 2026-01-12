<?php

namespace App\Filament\Widgets;

use App\Models\LetterType;
// Gunakan alias 'BaseWidget' agar lebih singkat
use Filament\Widgets\StatsOverviewWidget as BaseWidget; 
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{    
    protected static ?int $sort = 1;
    protected function getStats(): array
    {
        return [
            // Statistik 1: Mengambil data dari Database (LetterType)
            Stat::make('Layanan Tersedia', LetterType::count())
                ->description('Jenis surat yang bisa diajukan')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]), 

            // Statistik 2: Data Dummy (Nanti diganti Real)
            Stat::make('Pengajuan Masuk', '5') 
                ->description('Menunggu diproses')
                ->descriptionIcon('heroicon-m-inbox-arrow-down')
                ->color('warning')
                ->chart([2, 5, 3, 7, 5, 10, 3]),

            // Statistik 3: Data Dummy
            Stat::make('Surat Selesai', '12')
                ->description('Bulan ini')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('success')
                ->chart([15, 4, 10, 2, 12, 4, 12]),
        ];
    }
}