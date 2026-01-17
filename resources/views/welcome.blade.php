<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Berta - Alam & Teknologi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-sage selection:text-berta-coffee">

    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute bottom-[-10%] right-[-5%] w-[500px] h-[500px] bg-berta-wood/10 rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute top-[-10%] left-[-10%] w-[600px] h-[600px] bg-berta-olive/10 rounded-full blur-[100px] opacity-70"></div>
    </div>

    <nav x-data="{ open: false }" class="fixed w-full z-50 transition-all duration-300 backdrop-blur-md bg-berta-dark/90 border-b border-berta-sage/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10 h-auto"> <div class="flex flex-col">
                        <span class="font-bold text-xl tracking-wide text-berta-cream leading-tight">Desa<span class="text-berta-olive">Berta</span></span>
                    </div>
                </div>

                <div class="hidden lg:flex space-x-6 items-center">
                    <a href="#beranda" class="text-sm font-medium text-berta-sage hover:text-berta-cream transition">Beranda</a>
                    <a href="#profil" class="text-sm font-medium text-berta-sage hover:text-berta-cream transition">Profil</a>
                    <a href="#struktur" class="text-sm font-medium text-berta-sage hover:text-berta-cream transition">Struktur</a>
                    <a href="#potensi" class="text-sm font-medium text-berta-sage hover:text-berta-cream transition">Potensi</a>
                    <a href="#galeri" class="text-sm font-medium text-berta-sage hover:text-berta-cream transition">Galeri</a>
                    
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="px-5 py-2 rounded-full bg-berta-olive text-berta-cream font-semibold text-xs transition hover:bg-berta-wood">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="px-5 py-2 rounded-full border border-berta-olive text-berta-olive font-medium text-xs transition hover:bg-berta-olive hover:text-berta-cream">Masuk</a>
                        @endauth
                    @endif
                </div>

                <div class="-mr-2 flex items-center lg:hidden">
                    <button @click="open = ! open" class="p-2 text-berta-sage hover:text-berta-cream">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                    </button>
                </div>
            </div>
        </div>
        <div x-show="open" class="lg:hidden bg-berta-dark border-b border-berta-sage/10">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#beranda" class="block px-3 py-2 text-berta-cream hover:bg-berta-olive/20 rounded">Beranda</a>
                <a href="#profil" class="block px-3 py-2 text-berta-sage hover:bg-berta-olive/20 rounded">Profil</a>
                <a href="#potensi" class="block px-3 py-2 text-berta-sage hover:bg-berta-olive/20 rounded">Potensi</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 text-berta-olive font-bold">Akses Warga</a>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 overflow-hidden text-center">
        <div class="max-w-4xl mx-auto px-4 relative z-10">
            <h1 class="text-5xl md:text-7xl font-bold text-berta-cream mb-4">Desa<span class="text-berta-olive">Berta</span></h1>
            <p class="text-xl md:text-2xl text-berta-sage font-light tracking-widest mb-8">KECAMATAN SUSUKAN, KABUPATEN BANJARNEGARA</p>
            <div class="w-24 h-1 bg-berta-wood mx-auto rounded-full"></div>
            <p class="mt-8 text-berta-taupe max-w-2xl mx-auto">Harmoni alam perbukitan dan inovasi digital untuk kesejahteraan warga.</p>
        </div>
    </section>

    <section id="profil" class="py-20 bg-berta-dark relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-berta-cream">Profil Desa</h2>
                <div class="w-16 h-1 bg-berta-olive mx-auto rounded-full mt-4"></div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="relative group">
                    <div class="absolute -inset-2 bg-gradient-to-r from-berta-olive to-berta-wood rounded-2xl opacity-30 blur-lg group-hover:opacity-50 transition duration-500"></div>
                    <img src="{{ asset('img/bgbaru.jpeg') }}" alt="Profil Desa" class="relative rounded-2xl shadow-2xl w-full object-cover h-[400px]">
                </div>
                
                <div class="space-y-6 text-berta-sage leading-relaxed text-justify">
                    <p>
                        <span class="text-berta-cream font-bold text-lg">Desa Berta</span>, terletak di Kecamatan Susukan, Banjarnegara, Jawa Tengah, adalah permata tersembunyi dengan keindahan alam memukau. Terdiri dari lima dusun dengan karakteristik unik, sebagian wilayahnya adalah persawahan hijau subur, sementara lainnya adalah perbukitan menawan dan hutan pinus milik Perhutani.
                    </p>
                    <p>
                        Memiliki struktur sosial terorganisir dengan <strong class="text-berta-olive">5 RW dan 28 RT</strong>. Hingga akhir 2023, jumlah penduduk tercatat 4.016 jiwa. Akses ke desa sangat strategis, hanya 15 menit dari ibu kota kecamatan Susukan.
                    </p>
                    <div class="bg-berta-wood/10 p-6 rounded-xl border border-berta-sage/10">
                        <h4 class="text-berta-cream font-bold mb-2">🎓 Pendidikan & Ekonomi</h4>
                        <p class="text-sm">Fasilitas pendidikan memadai dengan PAUD, TK, dan 3 SDN. Mayoritas warga bermatapencaharian sebagai petani, pengrajin anyaman, dan pedagang.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="struktur" class="py-20 bg-berta-coffee/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16">
                
                <div>
                    <h3 class="text-2xl font-bold text-berta-cream mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded bg-berta-olive flex items-center justify-center text-xs">01</span>
                        Struktur Organisasi
                    </h3>
                    <div class="bg-berta-dark p-2 rounded-2xl border border-berta-sage/20 shadow-lg hover:border-berta-olive/50 transition">
                        <img src="{{ asset('img/bagan.png') }}" alt="Struktur Organisasi" class="w-full rounded-xl opacity-90 hover:opacity-100 transition">
                    </div>
                </div>

                <div id="peta">
                    <h3 class="text-2xl font-bold text-berta-cream mb-6 flex items-center gap-3">
                        <span class="w-8 h-8 rounded bg-berta-wood flex items-center justify-center text-xs">02</span>
                        Peta Wilayah
                    </h3>
                    <div class="bg-berta-dark p-2 rounded-2xl border border-berta-sage/20 shadow-lg mb-6">
                        <img src="{{ asset('img/petabaru.jpeg') }}" alt="Peta Desa" class="w-full rounded-xl object-cover h-64">
                    </div>
                    <p class="text-berta-sage text-sm leading-relaxed">
                        Desa Berta diapit oleh batas alam yang unik. Utara berbatasan dengan Sungai Sapi, Selatan dengan Desa Sampang (Kebumen), Barat dengan Desa Derik, dan Timur dengan Desa Sirkandi.
                    </p>
                </div>

            </div>
        </div>
    </section>

    <section id="potensi" class="py-24 bg-berta-dark relative overflow-hidden">
        <div class="absolute top-0 right-0 w-1/3 h-full bg-gradient-to-l from-berta-olive/5 to-transparent"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-berta-cream">Potensi Unggulan</h2>
                <p class="mt-4 text-berta-taupe">Kekayaan alam, budaya, dan ekonomi kreatif warga Desa Berta.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="group p-8 rounded-3xl bg-berta-wood/10 border border-berta-sage/10 hover:bg-berta-wood/20 transition duration-300">
                    <div class="w-12 h-12 bg-berta-olive/20 rounded-xl flex items-center justify-center mb-6 text-berta-olive text-2xl">🏔️</div>
                    <h3 class="text-xl font-bold text-berta-cream mb-3">Pariwisata Alam</h3>
                    <p class="text-berta-sage/80 text-sm leading-relaxed">
                        Bukit Watu Rampak menawarkan view 180 derajat yang memukau untuk sunrise dan sunset. Curug tersembunyi dan hutan pinus asri menjadi daya tarik bagi pecinta alam.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-berta-wood/10 border border-berta-sage/10 hover:bg-berta-wood/20 transition duration-300">
                    <div class="w-12 h-12 bg-berta-wood/20 rounded-xl flex items-center justify-center mb-6 text-berta-wood text-2xl">🎋</div>
                    <h3 class="text-xl font-bold text-berta-cream mb-3">Ekonomi Kreatif</h3>
                    <p class="text-berta-sage/80 text-sm leading-relaxed">
                        Pusat kerajinan bambu (Besek/Pithi). Produksi Gula Merah & Kristal di Dusun Mertelu. Kuliner khas Cimplung, Tape Singkong, dan Keripik Dampleng di Kalibangkang.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-berta-wood/10 border border-berta-sage/10 hover:bg-berta-wood/20 transition duration-300">
                    <div class="w-12 h-12 bg-berta-coffee/40 rounded-xl flex items-center justify-center mb-6 text-berta-sage text-2xl">🎭</div>
                    <h3 class="text-xl font-bold text-berta-cream mb-3">Seni & Budaya</h3>
                    <p class="text-berta-sage/80 text-sm leading-relaxed">
                        Musik Gamelan yang lestari. Tradisi Sadran, Suran (Wirayatan), dan Tumpengan sebagai wujud syukur dan perekat sosial masyarakat yang masih sangat kental.
                    </p>
                </div>

                <div class="group p-8 rounded-3xl bg-berta-wood/10 border border-berta-sage/10 hover:bg-berta-wood/20 transition duration-300">
                    <div class="w-12 h-12 bg-blue-900/40 rounded-xl flex items-center justify-center mb-6 text-blue-300 text-2xl">💧</div>
                    <h3 class="text-xl font-bold text-berta-cream mb-3">Sumber Daya Air</h3>
                    <p class="text-berta-sage/80 text-sm leading-relaxed">
                        Melimpahnya mata air jernih di perbukitan dan hutan perhutani. Berpotensi dikembangkan menjadi wisata air dan sumber PDAM desa mandiri.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="galeri" class="py-20 bg-berta-coffee/10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-berta-cream mb-10 text-center">Galeri Kegiatan</h2>
            
            <div class="columns-2 md:columns-3 lg:columns-4 gap-4 space-y-4">
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/bg3.png') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/foto.jpg') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/foto1.jpg') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/foto2.jpg') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/besek.png') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/wisata.png') }}" class="w-full">
                </div>
                <div class="break-inside-avoid rounded-xl overflow-hidden shadow-lg border border-berta-sage/10 hover:scale-105 transition duration-300">
                    <img src="{{ asset('img/budaya.png') }}" class="w-full">
                </div>
                 </div>
        </div>
    </section>

    <footer id="contact" class="bg-berta-dark border-t border-berta-sage/10 pt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mb-12">
                <div class="rounded-2xl overflow-hidden border border-berta-sage/20 shadow-xl h-80">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.270313083659!2d109.46747537402684!3d-7.435272373248386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6556e40242277d%3A0xe7a505b22b62b0c1!2sBalai%20Desa%20Berta!5e0!3m2!1sid!2sid!4v1705030000000!5m2!1sid!2sid" 
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" class="grayscale hover:grayscale-0 transition duration-700">
                    </iframe>
                </div>

                <div class="flex flex-col justify-center">
                    <h2 class="text-3xl font-bold text-berta-cream mb-6">Hubungi Kami</h2>
                    <p class="text-berta-sage mb-8">Silakan datang langsung ke Kantor Balai Desa Berta atau hubungi kami melalui media sosial di bawah ini.</p>
                    
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 text-berta-cream">
                            <span class="w-10 h-10 rounded-full bg-berta-olive flex items-center justify-center">📍</span>
                            <span>Jl. Raya Berta No. 1, Susukan, Banjarnegara</span>
                        </li>
                        <li class="flex items-center gap-4 text-berta-cream">
                            <span class="w-10 h-10 rounded-full bg-berta-wood flex items-center justify-center">📧</span>
                            <a href="mailto:desaberta.kecsusukan@gmail.com" class="hover:text-berta-olive transition">desaberta.kecsusukan@gmail.com</a>
                        </li>
                        <li class="flex items-center gap-4 text-berta-cream">
                            <span class="w-10 h-10 rounded-full bg-blue-600 flex items-center justify-center">f</span>
                            <a href="https://www.facebook.com/people/DESA-BERTA/100066475877107/" target="_blank" class="hover:text-blue-400 transition">Facebook Desa Berta</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-berta-sage/10 py-8 text-center text-berta-sage/40 text-sm">
                <p>Created by <span class="text-berta-olive">KKN53 UIN Saizu Kelompok 18</span> | © 2024 - 2026</p>
            </div>
        </div>
    </footer>

</body>
</html>