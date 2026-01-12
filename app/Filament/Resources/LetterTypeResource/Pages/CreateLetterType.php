<?php

namespace App\Filament\Resources\LetterTypeResource\Pages;

use App\Filament\Resources\LetterTypeResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateLetterType extends CreateRecord
{
    protected static string $resource = LetterTypeResource::class;

    // 1. Ubah Judul Halaman
    public function getTitle(): string
    {
        return 'Tambah Jenis Surat';
    }

    // 2. Ubah Tombol Simpan
    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Simpan')
            ->icon('heroicon-o-check');
    }

    // 3. Ubah Tombol Simpan & Buat Lagi
    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Simpan & Tambah Lagi');
    }

    // 4. Redirect ke halaman List setelah simpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}