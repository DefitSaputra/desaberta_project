<?php

namespace App\Filament\Resources\BeritaResource\Pages;

use App\Filament\Resources\BeritaResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBeritas extends ListRecords
{
    protected static string $resource = BeritaResource::class;

    public function getTitle(): string 
    {
        return 'Daftar Berita Desa';
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tulis Berita Baru'),
        ];
    }
}