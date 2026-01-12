<?php

namespace App\Filament\Resources\LetterTypeResource\Pages;

use App\Filament\Resources\LetterTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Actions\Action;

class EditLetterType extends EditRecord
{
    protected static string $resource = LetterTypeResource::class;

    // 1. Ubah Judul Halaman
    public function getTitle(): string
    {
        return 'Ubah Jenis Surat';
    }

    // 2. Ubah Tombol Simpan Perubahan
    protected function getSaveFormAction(): Action
    {
        return parent::getSaveFormAction()
            ->label('Simpan Perubahan')
            ->icon('heroicon-o-check');
    }

    // 3. Ubah Tombol Batal
    protected function getCancelFormAction(): Action
    {
        return parent::getCancelFormAction()
            ->label('Batal');
    }

    // 4. Ubah Tombol Hapus (Pojok Kanan Atas)
    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->label('Hapus')
                ->modalHeading('Hapus Jenis Surat')
                ->modalDescription('Apakah Anda yakin ingin menghapus jenis surat ini? Data permohonan yang menggunakan jenis surat ini mungkin akan error.')
                ->modalSubmitActionLabel('Ya, Hapus')
                ->modalCancelActionLabel('Batal'),
        ];
    }
}