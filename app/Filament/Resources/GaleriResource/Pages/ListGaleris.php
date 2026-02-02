<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGaleris extends ListRecords
{
    protected static string $resource = GaleriResource::class;

    // 1. Mengubah Judul Halaman (Paling Atas)
    public function getTitle(): string 
    {
        return 'Daftar Galeri Desa';
    }

    protected function getHeaderActions(): array
    {
        return [
            // 2. Mengubah Label Tombol Tambah
            Actions\CreateAction::make()
                ->label('Tambah Galeri Baru'),
        ];
    }
}