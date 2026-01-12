<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\SimpleType\Jc;

class GenerateLetterTemplates extends Command
{
    protected $signature = 'templates:generate';
    protected $description = 'Generate default letter templates for Desa Berta';

    public function handle()
    {
        $this->info('Memulai pembuatan template surat...');

        // Pastikan folder ada
        if (!file_exists(storage_path('app/templates'))) {
            mkdir(storage_path('app/templates'), 0777, true);
        }

        $templates = [
            '01SKCK' => [
                'title' => 'SURAT PENGANTAR CATATAN KEPOLISIAN',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan dibawah ini Kepala Desa Berta menerangkan bahwa :\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nAgama : \${agama}\nPekerjaan : \${pekerjaan}\nStatus Perkawinan : \${status}\nAlamat : \${alamat}\n\nKeperluan : \${keperluan}\nBerlaku : \${masa_berlaku}\n\nKeterangan : Bahwa orang tersebut benar-benar penduduk Desa kami, menurut pengetahuan kami bahwa orang tersebut selama ini berkelakuan baik.\n\nDemikian surat keterangan ini dibuat untuk menjadikan periksa guna seperlunya."
            ],
            '02KETDOM' => [
                'title' => 'SURAT KETERANGAN DOMISILI',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan dengan sebenarnya bahwa:\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nJenis Kelamin : \${jenkel}\nAgama : \${agama}\nPekerjaan : \${pekerjaan}\nStatus Perkawinan : \${status}\nAlamat : \${alamat}\n\nBenar bahwa nama tersebut di atas adalah penduduk yang berdomisili dan bertempat tinggal di alamat tersebut di atas pada Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara.\n\nSurat Keterangan ini dibuat untuk keperluan: \${keperluan}\n\nDemikian Surat Keterangan Domisili ini dibuat untuk dapat dipergunakan sebagaimana mestinya."
            ],
            '03SURPENG' => [
                'title' => 'SURAT PENGANTAR UMUM',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan bahwa:\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nAgama : \${agama}\nPekerjaan : \${pekerjaan}\nAlamat : \${alamat}\n\nOrang tersebut adalah benar warga Desa Berta yang berkelakuan baik. Surat ini diberikan sebagai pengantar untuk mengurus: \${keperluan}\n\nDemikian surat pengantar ini dibuat untuk menjadikan periksa."
            ],
            '04SUPNGTRKADES' => [
                'title' => 'SURAT KETERANGAN PENGANTAR',
                'kop_type' => 'kades', // Kop Kepala Desa
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan dengan sebenarnya bahwa:\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nAgama : \${agama}\nPekerjaan : \${pekerjaan}\nStatus Perkawinan : \${status}\nAlamat : \${alamat}\n\nOrang tersebut di atas adalah benar-benar penduduk Desa Berta. Surat ini diberikan untuk keperluan:\n\n\${keperluan}\n\nKeterangan Lain : \${keterangan_lain}\n\nDemikian Surat Keterangan ini kami buat dengan sebenar-benarnya, kepada yang bersangkutan untuk menjadikan periksa guna seperlunya."
            ],
            '05SKTMSD' => [
                'title' => 'SURAT KETERANGAN TIDAK MAMPU (SKTM)',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan dengan sebenarnya bahwa:\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nPekerjaan : \${pekerjaan}\nAlamat : \${alamat}\n\nAdalah benar warga Desa Berta yang menurut pengamatan kami tergolong keluarga TIDAK MAMPU / PRA-SEJAHTERA.\n\nSurat Keterangan ini dibuat untuk keperluan: \${keperluan}\n\nDemikian Surat Keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya."
            ],
            '05SURPENGHASILAN' => [
                'title' => 'SURAT KETERANGAN PENGHASILAN',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan dengan sebenarnya bahwa:\n\nNama : \${nama}\nNIK : \${nik}\nTempat/Tgl. Lahir : \${ttl}\nPekerjaan : \${pekerjaan}\nAlamat : \${alamat}\n\nBenar nama tersebut di atas adalah penduduk Desa Berta yang bekerja sebagai \${pekerjaan} dan mempunyai penghasilan rata-rata per bulan sebesar: Rp \${penghasilan},-\n\nSurat Keterangan ini dibuat untuk keperluan: \${keperluan}\n\nDemikian Surat Keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya."
            ],
            '07SURKETYATIM' => [
                'title' => 'SURAT KETERANGAN YATIM / PIATU',
                'kop_type' => 'sekretariat',
                'body' => "Yang bertanda tangan di bawah ini Kepala Desa Berta, Kecamatan Susukan, Kabupaten Banjarnegara, menerangkan dengan sebenarnya bahwa:\n\nNama Anak : \${nama}\nTempat/Tgl. Lahir : \${ttl}\nJenis Kelamin : \${jenkel}\nAlamat : \${alamat}\n\nAdalah benar anak tersebut di atas berstatus sebagai: \${status_yatim} (Yatim / Piatu / Yatim Piatu).\n\nSurat Keterangan ini dibuat untuk keperluan: \${keperluan}\n\nDemikian Surat Keterangan ini dibuat dengan sebenarnya untuk dapat dipergunakan sebagaimana mestinya."
            ]
        ];

        foreach ($templates as $filename => $content) {
            $this->createDocx($filename, $content['title'], $content['body'], $content['kop_type']);
            $this->info("✅ Berhasil membuat: {$filename}.docx");
        }

        $this->info('Selesai! Cek folder storage/app/templates');
    }

    private function createDocx($filename, $title, $bodyContent, $kopType)
    {
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');
        $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection();

        // --- KOP SURAT ---
        $phpWord->addParagraphStyle('kopStyle', ['alignment' => Jc::CENTER, 'spaceAfter' => 0]);
        $fontKop = ['bold' => true, 'size' => 14, 'allCaps' => true];
        
        $section->addText("PEMERINTAH KABUPATEN BANJARNEGARA", $fontKop, 'kopStyle');
        $section->addText("KECAMATAN SUSUKAN", $fontKop, 'kopStyle');
        
        if ($kopType === 'kades') {
            $section->addText("KEPALA DESA BERTA", ['bold' => true, 'size' => 16, 'allCaps' => true], 'kopStyle');
            $section->addText("Alamat : Jl. Raya Karang Jati-Glempang No 1 Desa Berta Kecamatan Susukan 53475", ['size' => 10, 'italic' => true], 'kopStyle');
        } else {
            $section->addText("SEKRETARIAT DESA BERTA", ['bold' => true, 'size' => 16, 'allCaps' => true], 'kopStyle');
            $section->addText("Alamat : Jln. Krajan Rt.03/02 Desa Berta Kode Pos 53475", ['size' => 10, 'italic' => true], 'kopStyle');
        }
        
        $section->addText("__________________________________________________________________________", ['bold' => true], 'kopStyle');
        $section->addTextBreak(1);

        // --- JUDUL ---
        $section->addText($title, ['bold' => true, 'underline' => 'single', 'size' => 12], 'kopStyle');
        $section->addText("Nomor : \${no_surat}", ['size' => 12], 'kopStyle');
        $section->addTextBreak(1);

        // --- ISI ---
        $lines = explode("\n", $bodyContent);
        foreach ($lines as $line) {
            if (trim($line) === "") {
                $section->addTextBreak(1);
            } else {
                $section->addText($line, null, ['alignment' => Jc::BOTH]);
            }
        }

        // --- TANDA TANGAN ---
        $section->addTextBreak(2);
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(4000); 
        $cellKanan = $table->addCell(5000);
        
        $cellKanan->addText("Berta, \${tgl_surat}", null, ['alignment' => Jc::CENTER]);
        if ($kopType === 'kades') {
            $cellKanan->addText("Kepala Desa Berta", null, ['alignment' => Jc::CENTER]);
        } else {
            $cellKanan->addText("An. KEPALA DESA BERTA", null, ['alignment' => Jc::CENTER]);
            $cellKanan->addText("Sekretaris Desa", null, ['alignment' => Jc::CENTER]);
        }
        
        $cellKanan->addTextBreak(3);
        $cellKanan->addText("( \${nama_pejabat} )", ['bold' => true, 'underline' => 'single'], ['alignment' => Jc::CENTER]);

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path("app/templates/{$filename}.docx"));
    }
}