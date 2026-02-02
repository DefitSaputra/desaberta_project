<?php

namespace App\Filament\Resources\StatistikPendudukResource\Pages;

use App\Filament\Resources\StatistikPendudukResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStatistikPenduduk extends EditRecord
{
    protected static string $resource = StatistikPendudukResource::class;

    public function getTitle(): string 
    {
        return 'Ubah Data Statistik';
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}