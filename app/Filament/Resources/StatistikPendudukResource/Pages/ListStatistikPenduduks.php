<?php

namespace App\Filament\Resources\StatistikPendudukResource\Pages;

use App\Filament\Resources\StatistikPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatistikPenduduks extends ListRecords
{
    protected static string $resource = StatistikPendudukResource::class;

    public function getTitle(): string 
    {
        return 'Data Statistik Desa';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('Tambah Data Statistik'),
        ];
    }
}