<?php

namespace Database\Seeders;

use App\Models\LetterType;
use Illuminate\Database\Seeder;

class LetterTypeSeeder extends Seeder
{
    public function run(): void
    {
        // Kita buat data hardcode agar kodenya (SKTM, SKCK, dll) sesuai dengan logic form
        $data = [
            [
                'name' => 'Surat Keterangan Tidak Mampu',
                'code' => 'SKTM', // Code ini memicu field Penghasilan
                'template_file' => 'pending_upload.docx', // Isi sembarang text
            ],
            [
                'name' => 'Surat Pengantar SKCK',
                'code' => 'SKCK', // Code ini memicu field Masa Berlaku
                'template_file' => 'pending_upload.docx', // Isi sembarang text
            ],
            [
                'name' => 'Surat Keterangan Domisili',
                'code' => 'DOMI', // Umum (tidak ada field khusus)
                'template_file' => 'pending_upload.docx', // Isi sembarang text
            ],
            [
                'name' => 'Surat Keterangan Beda Nama',
                'code' => 'BEDA', // Code ini memicu field Nama Lama & Baru
                'template_file' => 'pending_upload.docx', // Isi sembarang text
            ],
            [
                'name' => 'Surat Rekomendasi Izin Keramaian',
                'code' => 'REKO', // Code ini memicu field Keterangan Lain
                'template_file' => 'pending_upload.docx', // Isi sembarang text
            ],
        ];

        foreach ($data as $item) {
            LetterType::create($item);
        }
    }
}