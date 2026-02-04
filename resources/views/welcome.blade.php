<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Berta - Alam & Teknologi</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    {{-- Menambahkan Playfair Display untuk judul yang lebih elegan --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Hero Slider (Beranda) --}}
    <section id="beranda">
        @include('components.hero-slider')
    </section>

    {{-- Jelajahi (Grid Menu) --}}
    @include('components.jelajahi-section')

    {{-- Sambutan Kades (Dengan Animasi Scroll) --}}
    @include('components.sambutan-kades')

    {{-- Peta Desa --}}
    @include('components.peta-section')

    {{-- Struktur Organisasi --}}
    @include('components.struktur-organisasi')

    {{-- Profil Singkat --}}
    @include('components.profil-section')

    {{-- Potensi Desa --}}
    @include('components.potensi-section')

    {{-- Berita Terbaru --}}
    @include('components.berita-section')

    {{-- Galeri Foto --}}
    @include('components.galeri-section')

    {{-- Footer --}}
    @include('components.footer')

    {{-- 
        [SCRIPT ANIMASI SCROLL GLOBAL]
        Script ini wajib ada agar class 'animate-on-scroll' di komponen-komponen lain
        bisa berfungsi (muncul perlahan saat di-scroll).
    --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Konfigurasi Observer
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.15 // Animasi jalan saat 15% elemen terlihat
            };

            // Fungsi Callback saat elemen terlihat
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        // Ambil delay dari atribut data (default 0ms)
                        const delay = el.dataset.animDelay || 0;
                        
                        setTimeout(() => {
                            // Hapus state awal (sembunyi/turun)
                            el.classList.remove('opacity-0', 'translate-y-12');
                            // Tambah state akhir (muncul/normal)
                            el.classList.add('opacity-100', 'translate-y-0');
                        }, delay);
                        
                        // Stop mengamati setelah animasi jalan
                        observer.unobserve(el);
                    }
                });
            }, observerOptions);

            // Cari semua elemen dengan class 'animate-on-scroll'
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                // Tambahkan style dasar transisi CSS secara otomatis
                el.classList.add('transform', 'translate-y-12', 'opacity-0', 'transition-all', 'duration-1000', 'ease-out');
                // Mulai amati
                observer.observe(el);
            });
        });
    </script>

</body>
</html>