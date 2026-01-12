<?php

namespace App\Filament\Resources\LetterRequestResource\Pages;

use App\Filament\Resources\LetterRequestResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditLetterRequest extends EditRecord
{
    protected static string $resource = LetterRequestResource::class;

    // 1. Ubah Judul Halaman
    public function getTitle(): string
    {
        return 'Ubah Data Permohonan';
    }

    // 2. Ubah Tombol "Save Changes"
    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan')
            ->icon('heroicon-o-check');
    }

    // 3. Ubah Tombol "Cancel" (Batal)
    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    // 4. Ubah Tombol "Delete" di Pojok Kanan Atas
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus Permohonan')
                ->modalHeading('Hapus Data Permohonan')
                ->modalDescription('Apakah Anda yakin ingin menghapus data ini? Data yang dihapus tidak dapat dikembalikan.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->modalCancelActionLabel('Batal'),
        ];
    }
}