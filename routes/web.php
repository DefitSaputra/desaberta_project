<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Rute Halaman Utama (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Rute Baru: Halaman Struktur Organisasi Lengkap (Publik)
Route::get('/struktur-pemerintahan', function () {
    return view('struktur-lengkap');
})->name('struktur.lengkap');

// Rute Halaman Profil Desa Lengkap
Route::get('/profil-desa', function () {
    return view('profil-lengkap');
})->name('profil.desa');

Route::get('/potensi-desa', function () {
    return view('potensi-lengkap');
})->name('potensi.desa');

// Rute Dashboard (Wajib Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rute Profil User (Wajib Login)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';