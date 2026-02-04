<?php

namespace App\Filament\Widgets;

use App\Models\SiteVisit;
use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class TrafficChart extends ChartWidget
{
    protected static ?string $heading = '📈 Tren Kunjungan Website (7 Hari Terakhir)';
    protected static ?int $sort = 2;
    protected static ?string $pollingInterval = '30s';
    
    // Warna Modern
    protected static ?string $maxHeight = '300px';

    protected function getData(): array
    {
        // Data 7 hari terakhir
        $data = [];
        $labels = [];
        
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('D, d M');
            $data[] = SiteVisit::whereDate('created_at', $date->toDateString())->count();
        }

        return [
            'datasets' => [
                [
                    'label' => 'Kunjungan',
                    'data' => $data,
                    'backgroundColor' => 'rgba(67, 104, 80, 0.1)',
                    'borderColor' => 'rgba(67, 104, 80, 1)',
                    'borderWidth' => 3,
                    'fill' => true,
                    'tension' => 0.4, // Smooth curve
                    'pointBackgroundColor' => 'rgba(67, 104, 80, 1)',
                    'pointBorderColor' => '#fff',
                    'pointBorderWidth' => 2,
                    'pointRadius' => 5,
                    'pointHoverRadius' => 7,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
    
    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'bottom',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(0, 0, 0, 0.05)',
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