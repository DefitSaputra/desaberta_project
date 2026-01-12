<?php

namespace App\Filament\Resources\LetterRequestResource\Pages;

use App\Filament\Resources\LetterRequestResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\Action;

class CreateLetterRequest extends CreateRecord
{
    protected static string $resource = LetterRequestResource::class;

    // 1. Ubah Judul Halaman (Pojok Kiri Atas)
    public function getTitle(): string
    {
        return 'Buat Permohonan Baru';
    }

    // 2. Ubah Teks Tombol "Create" (Simpan)
    protected function getCreateFormAction(): Action
    {
        return parent::getCreateFormAction()
            ->label('Simpan Permohonan')
            ->icon('heroicon-o-check');
    }

    // 3. Ubah Teks Tombol "Create & Create Another"
    protected function getCreateAnotherFormAction(): Action
    {
        return parent::getCreateAnotherFormAction()
            ->label('Simpan & Buat Lagi');
    }

    // 4. (Opsional) Redirect ke halaman List setelah simpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}