<?php

namespace App\Filament\Resources\LetterTypeResource\Pages;

use App\Filament\Resources\LetterTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLetterTypes extends ListRecords
{
    protected static string $resource = LetterTypeResource::class;

    // 1. Ubah Judul Halaman Daftar
    public function getTitle(): string
    {
        return 'Daftar Jenis Surat';
    }

    // 2. Tombol Tambah Baru
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Jenis Surat')
                ->icon('heroicon-o-plus'),
        ];
    }
}