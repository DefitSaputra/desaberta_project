<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Galeri;
use App\Models\Berita;
use App\Models\StatistikPenduduk;
use Illuminate\Http\Request;

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

Route::get('/admin-entry', function (Request $request) {
    // Set a short-lived session flag so the middleware will allow access
    $request->session()->put('allowed_admin_at', now()->timestamp);

    return redirect('/admin');
})->name('admin.entry');

// Rute untuk Sitemap XML (Otomatis)
Route::get('/sitemap.xml', function () {
    $berita = \App\Models\Berita::where('is_published', true)->latest()->get();
    
    return response()->view('sitemap', [
        'berita' => $berita,
    ])->header('Content-Type', 'text/xml');
});

// --- RUTE DARURAT (Hanya dipakai sekali untuk fix gambar) ---
Route::get('/fix-storage', function () {
    $target = storage_path('app/public');
    $link = public_path('storage');

    // Hapus link lama yang mungkin rusak
    if (file_exists($link)) { 
        unlink($link); 
    }

    // Buat link baru
    symlink($target, $link);

    return "Sukses! Folder storage sudah terhubung. Silakan cek gambar kembali.";
});

// Small JSON endpoint for Filament to poll online users (last 5 minutes)
Route::get('/filament/stats/online', function () {
    $count = App\Models\SiteVisit::where('created_at', '>=', now()->subMinutes(5))->distinct('session_id')->count('session_id');
    return response()->json(['online' => $count]);
})->middleware('auth');

require __DIR__.'/auth.php';