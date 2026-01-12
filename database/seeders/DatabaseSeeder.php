<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat 1 User Admin (biar Anda bisa login)
        // Ganti email sesuai yang Anda pakai login sekarang, atau biarkan jika sudah ada
        // User::factory()->create([
        //     'name' => 'Admin Desa',
        //     'email' => 'admin@desaberta.com',
        // ]);

        // 2. Buat 10 Warga Dummy (User Biasa)
        User::factory(10)->create(); 

        // 3. Panggil Seeder Jenis Surat yang tadi kita buat
        $this->call(LetterTypeSeeder::class);
    }
}