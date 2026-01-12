<?php

namespace App\Filament\Resources\LetterRequestResource\Pages;

use App\Filament\Resources\LetterRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterRequests extends ListRecords
{
    protected static string $resource = LetterRequestResource::class;

    // 1. Ubah Judul Halaman Daftar
    public function getTitle(): string
    {
        return 'Daftar Permohonan Masuk';
    }

    // 2. Tombol "Buat Baru"
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Buat Permohonan Baru')
                ->icon('heroicon-o-plus'),
        ];
    }
}