<?php

namespace App\Filament\Resources\GaleriResource\Pages;

use App\Filament\Resources\GaleriResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGaleri extends CreateRecord
{
    protected static string $resource = GaleriResource::class;

    // 1. Mengubah Judul Halaman
    public function getTitle(): string 
    {
        return 'Tambah Galeri Baru';
    }

    // 2. Redirect setelah simpan (Balik ke daftar)
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}