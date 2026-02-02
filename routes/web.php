<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\StatistikPenduduk;

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
    // 1. Ambil data galeri
    $galeri = Galeri::where('is_active', true)->latest()->take(6)->get();

    // 2. Ambil 3 Berita Terbaru yang statusnya Published
    $berita = Berita::where('is_published', true)
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->take(3)
                ->get();

    // Kirim kedua variabel ke view
    return view('welcome', compact('galeri', 'berita'));
});

// Rute Daftar Berita (Semua Berita / Arsip)
Route::get('/berita', function () {
    $berita = Berita::where('is_published', true)
                ->where('published_at', '<=', now())
                ->latest('published_at')
                ->paginate(9); 
    
    return view('berita-lengkap', compact('berita'));
})->name('berita.index');

// Rute Baca Berita Detail (Berdasarkan Slug)
Route::get('/berita/{slug}', function ($slug) {
    $berita = Berita::where('slug', $slug)
                ->where('is_published', true)
                ->firstOrFail();
                
    return view('berita-detail', compact('berita'));
})->name('berita.show');

// [BARU] Rute Halaman Data Desa (Statistik)
Route::get('/data-desa', function () {
    // Ambil semua data dari database
    $semuaData = StatistikPenduduk::all();

    // Kelompokkan data agar mudah dipanggil di View Grafik
    $dataUmur = $semuaData->where('kategori', 'umur');
    
    // [PERBAIKAN] Data Pekerjaan DIURUTKAN dari yang terbanyak
    // Agar grafik terlihat rapi (Pareto)
    $dataPekerjaan = $semuaData->where('kategori', 'pekerjaan')
                                ->sortByDesc('jumlah_total')
                                ->values(); 

    $dataAgama = $semuaData->where('kategori', 'agama');
    $dataPendidikan = $semuaData->where('kategori', 'pendidikan');
    $dataKawin = $semuaData->where('kategori', 'status_kawin');

    return view('data-desa', compact(
        'dataUmur', 
        'dataPekerjaan', 
        'dataAgama', 
        'dataPendidikan', 
        'dataKawin'
    ));
})->name('data.desa');

// Rute Halaman Galeri Lengkap
Route::get('/galeri', function () {
    $galeri = Galeri::where('is_active', true)->latest()->paginate(12);
    return view('galeri-lengkap', compact('galeri'));
})->name('galeri.index');

// Rute Halaman Struktur Organisasi Lengkap (Publik)
Route::get('/struktur-pemerintahan', function () {
    return view('struktur-lengkap');
})->name('struktur.lengkap');

// Rute Halaman Profil Desa Lengkap
Route::get('/profil-desa', function () {
    return view('profil-lengkap');
})->name('profil.desa');

// Rute Halaman Potensi Desa
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