<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatistikPendudukSeeder extends Seeder
{
    public function run(): void
    {
        // Bersihkan data lama agar tidak duplikat saat di-seed ulang (Opsional)
        // DB::table('statistik_penduduks')->truncate(); 

        // 1. KELOMPOK UMUR (Data Asli Desa Berta)
        $dataUmur = [
            ['0-4 Tahun', 130, 115],
            ['5-9 Tahun', 173, 166],
            ['10-14 Tahun', 174, 152],
            ['15-19 Tahun', 171, 133],
            ['20-24 Tahun', 151, 134],
            ['25-29 Tahun', 129, 144],
            ['30-34 Tahun', 173, 169],
            ['35-39 Tahun', 168, 145],
            ['40-44 Tahun', 158, 172],
            ['45-49 Tahun', 140, 127],
            ['50-54 Tahun', 118, 116],
            ['55-59 Tahun', 95, 95],
            ['60-64 Tahun', 83, 104],
            ['65-69 Tahun', 77, 61],
            ['70-74 Tahun', 51, 47],
            ['75+ Tahun', 77, 71],
        ];

        foreach ($dataUmur as $d) {
            DB::table('statistik_penduduks')->insert([
                'kategori' => 'umur',
                'label' => $d[0],
                'jumlah_laki' => $d[1],
                'jumlah_perempuan' => $d[2],
                'jumlah_total' => $d[1] + $d[2],
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        // --- (Bagian Agregat Kabupaten - Desa Berta yang sebelumnya) ---
        DB::table('statistik_penduduks')->insert([
            'kategori' => 'kabupaten',
            'label' => 'Desa Berta',
            'jumlah_laki' => 2068,
            'jumlah_perempuan' => 1951,
            'jumlah_total' => 4019,
            'created_at' => now(), 'updated_at' => now(),
        ]);
        
       // 2. DATA PEKERJAAN LENGKAP (DESA BERTA)
        // Format: [Label Pekerjaan, Jumlah Laki-laki, Jumlah Perempuan]
        $dataPekerjaan = [
            ['Belum/Tidak Bekerja', 542, 465],
            ['Mengurus Rumah Tangga', 0, 871],
            ['Pelajar/Mahasiswa', 281, 230],
            ['Buruh Harian Lepas', 442, 69],
            ['Petani/Pekebun', 261, 131],
            ['Karyawan Swasta', 158, 50],
            ['Buruh Tani/Perkebunan', 108, 59],
            ['Wiraswasta', 104, 20],
            ['Pekerjaan Lainnya', 56, 10],
            ['Pedagang', 26, 18],
            ['Tukang Batu', 17, 0],
            ['Sopir', 17, 0],
            ['Perangkat Desa', 11, 2],
            ['Pegawai Negeri Sipil (PNS)', 10, 0],
            ['Perdagangan', 2, 7],
            ['Pembantu Rumah Tangga', 1, 8],
            ['Anggota Lembaga Tinggi Lainnya', 8, 1],
            ['Guru', 3, 5],
            ['Pensiunan', 3, 0],
            ['Peternak', 3, 0],
            ['Transportasi', 3, 0],
            ['Mekanik', 3, 0],
            ['Karyawan Honorer', 2, 1],
            ['Konstruksi', 2, 0],
            ['Tukang Jahit', 0, 2],
            ['Ustadz/Mubaligh', 2, 0],
            ['Karyawan BUMN', 1, 0],
            ['Tukang Kayu', 1, 0],
            ['Seniman', 1, 0],
            ['Bidan', 0, 1],
            ['Perawat', 0, 1],
        ];

        foreach ($dataPekerjaan as $d) {
            DB::table('statistik_penduduks')->insert([
                'kategori' => 'pekerjaan', // Kategori tetap sama
                'label' => $d[0],          // Nama Pekerjaan
                'jumlah_laki' => $d[1],
                'jumlah_perempuan' => $d[2],
                'jumlah_total' => $d[1] + $d[2], // Hitung total otomatis
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }

        // 4. PENDIDIKAN (Data Asli Desa Berta)
        $dataPendidikan = [
            ['Tidak/Belum Sekolah', 482, 460],
            ['Belum Tamat SD/Sederajat', 250, 252],
            ['Tamat SD/Sederajat', 762, 737],
            ['SLTP/Sederajat', 377, 323],
            ['SLTA/Sederajat', 177, 154],
            ['Diploma I/II', 3, 0],
            ['Akademi/Diploma III/S. Muda', 4, 4],
            ['Diploma IV/Strata I', 11, 21],
            ['Strata II', 2, 0],
            ['Strata III', 0, 0],
        ];

        foreach ($dataPendidikan as $d) {
            DB::table('statistik_penduduks')->insert([
                'kategori' => 'pendidikan',
                'label' => $d[0],
                'jumlah_laki' => $d[1],
                'jumlah_perempuan' => $d[2],
                'jumlah_total' => $d[1] + $d[2],
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }

        // 5. AGAMA (Data Asli Desa Berta)
        $dataAgama = [
            ['Islam', 2066, 1949],
            ['Kristen', 2, 2],
            ['Katholik', 0, 0],
            ['Hindu', 0, 0],
            ['Budha', 0, 0],
            ['Khonghucu', 0, 0],
            ['Kepercayaan Terhadap Tuhan YME', 0, 0],
        ];

        foreach ($dataAgama as $d) {
            DB::table('statistik_penduduks')->insert([
                'kategori' => 'agama',
                'label' => $d[0],
                'jumlah_laki' => $d[1],
                'jumlah_perempuan' => $d[2],
                'jumlah_total' => $d[1] + $d[2],
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }

        // 5. STATUS KAWIN (Data Kepala Keluarga Desa Berta)
        $dataKawin = [
            ['Belum Kawin', 13, 2],
            ['Kawin', 1032, 45],
            ['Cerai Hidup', 29, 47],
            ['Cerai Mati', 30, 106],
        ];

        foreach ($dataKawin as $d) {
            DB::table('statistik_penduduks')->insert([
                'kategori' => 'status_kawin',
                'label' => $d[0],
                'jumlah_laki' => $d[1],
                'jumlah_perempuan' => $d[2],
                'jumlah_total' => $d[1] + $d[2],
                'created_at' => now(), 
                'updated_at' => now(),
            ]);
        }
    }
}