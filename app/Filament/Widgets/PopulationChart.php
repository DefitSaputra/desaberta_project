<?php

namespace App\Filament\Widgets;

use App\Models\StatistikPenduduk;
use Filament\Widgets\ChartWidget;

class PopulationChart extends ChartWidget
{
    protected static ?string $heading = '👥 Distribusi Penduduk Berdasarkan Kelompok Umur';
    protected static ?int $sort = 3;
    
    protected static ?string $maxHeight = '350px';

    protected function getData(): array
    {
        // Ambil data kelompok umur
        $dataUmur = StatistikPenduduk::where('kategori', 'umur')
            ->orderBy('label')
            ->get();

        $labels = $dataUmur->pluck('label')->toArray();
        $lakiData = $dataUmur->pluck('jumlah_laki')->toArray();
        $perempuanData = $dataUmur->pluck('jumlah_perempuan')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Laki-laki',
                    'data' => $lakiData,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.8)', // Blue
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'borderWidth' => 2,
                ],
                [
                    'label' => 'Perempuan',
                    'data' => $perempuanData,
                    'backgroundColor' => 'rgba(236, 72, 153, 0.8)', // Pink
                    'borderColor' => 'rgba(236, 72, 153, 1)',
                    'borderWidth' => 2,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                    'ticks' => [
                        'precision' => 0,
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ],
        ];
    }
}