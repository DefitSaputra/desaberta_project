<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Lengkap - Desa Berta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
    </style>
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white">

    @include('components.navbar')

    <div class="relative h-[80vh] overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0">
            <img src="{{ asset('img/bgbaru.jpeg') }}" class="w-full h-full object-cover fixed top-0 left-0 -z-10 brightness-50" alt="Desa Berta">
             <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/30 via-berta-dark/10 to-berta-dark"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto">
            <span class="inline-block py-1.5 px-6 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-bold tracking-[0.2em] uppercase mb-6 text-berta-cream animate-fade-in-down">
                Profil Wilayah
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 drop-shadow-2xl font-playfair leading-tight animate-fade-in-up">
                Jantung Budaya & <br> <span class="text-berta-olive italic">Potensi Alam</span>
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto font-light leading-relaxed animate-fade-in-up delay-200">
                Menjelajahi keindahan geografis, kearifan lokal, dan semangat kemandirian masyarakat Desa Berta, Kecamatan Susukan.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 space-y-32 relative z-10 bg-berta-dark rounded-t-[3rem] -mt-20 shadow-[0_-20px_60px_-15px_rgba(0,0,0,0.5)]">

        <section class="relative">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-berta-olive/10 rounded-full blur-[80px] pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                <div class="lg:col-span-7 space-y-8 text-berta-taupe/90 text-lg leading-relaxed text-justify">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="h-1 w-12 bg-berta-olive rounded-full"></div>
                        <span class="text-berta-olive font-bold tracking-widest uppercase text-sm">Gambaran Umum</span>
                    </div>
                    <h2 class="text-4xl font-bold text-berta-cream mb-6 font-playfair">Permata Tersembunyi di Banjarnegara</h2>
                    <p>
                        <strong class="text-berta-cream">Desa Berta</strong> bukan sekadar wilayah administratif, melainkan sebuah ekosistem kehidupan yang harmonis. Terbentang seluas <strong>478,450 Hektar</strong>, desa ini memadukan lanskap dataran rendah yang subur untuk pertanian dengan kontur perbukitan yang sejuk dan asri.
                    </p>
                    <p>
                        Secara administratif, denyut nadi kehidupan desa tersebar di <strong class="text-berta-cream">5 Dusun</strong> utama. Kelima dusun ini saling terhubung dalam semangat gotong royong yang menjadi ciri khas masyarakat kami:
                    </p>
                    
                    <div class="grid grid-cols-2 gap-4 mt-6">
                        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="w-8 h-8 flex items-center justify-center bg-berta-olive/20 rounded-full text-berta-olive font-bold text-xs">01</span>
                            <span class="text-sm font-semibold text-berta-cream">Dusun Dananyuda</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="w-8 h-8 flex items-center justify-center bg-berta-olive/20 rounded-full text-berta-olive font-bold text-xs">02</span>
                            <span class="text-sm font-semibold text-berta-cream">Dusun Pete</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="w-8 h-8 flex items-center justify-center bg-berta-olive/20 rounded-full text-berta-olive font-bold text-xs">03</span>
                            <span class="text-sm font-semibold text-berta-cream">Dusun Krajan</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="w-8 h-8 flex items-center justify-center bg-berta-olive/20 rounded-full text-berta-olive font-bold text-xs">04</span>
                            <span class="text-sm font-semibold text-berta-cream">Dusun Kalibangkang</span>
                        </div>
                        <div class="flex items-center gap-3 p-3 bg-white/5 rounded-xl border border-white/5 hover:bg-white/10 transition duration-300 col-span-2 md:col-span-1">
                            <span class="w-8 h-8 flex items-center justify-center bg-berta-olive/20 rounded-full text-berta-olive font-bold text-xs">05</span>
                            <span class="text-sm font-semibold text-berta-cream">Dusun Mertelu</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-5 lg:sticky lg:top-32">
                    <div class="bg-gradient-to-br from-berta-wood/10 to-berta-dark p-1 rounded-3xl">
                        <div class="bg-berta-dark/90 backdrop-blur-xl rounded-[1.3rem] p-8 border border-berta-sage/10 relative overflow-hidden">
                            <div class="absolute -bottom-10 -right-10 opacity-5 pointer-events-none">
                                <svg class="w-64 h-64 text-berta-cream" fill="currentColor" viewBox="0 0 24 24"><path d="M20.5 3l-.16.03L15 5.1 9 3 3.36 4.9c-.21.07-.36.25-.36.48V20.5c0 .28.22.5.5.5l.16-.03L9 18.9l6 2.1 5.64-1.9c.21-.07.36-.25.36-.48V3.5c0-.28-.22-.5-.5-.5zM15 19l-6-2.11V5l6 2.11V19z"/></svg>
                            </div>
                            
                            <h3 class="text-xl font-bold text-berta-cream mb-8 border-b border-berta-sage/10 pb-4">Batas Administratif</h3>
                            
                            <div class="space-y-6 relative z-10">
                                <div class="group flex items-start gap-4 transition duration-300">
                                    <div class="w-10 h-10 rounded-full bg-berta-olive/10 flex items-center justify-center text-berta-olive font-bold text-sm border border-berta-olive/20 group-hover:bg-berta-olive group-hover:text-white transition">U</div>
                                    <div>
                                        <h4 class="text-xs font-bold text-berta-sage uppercase tracking-wider mb-1">Sebelah Utara</h4>
                                        <p class="text-berta-cream font-medium">Kecamatan Purwareja Klampok</p>
                                    </div>
                                </div>
                                <div class="group flex items-start gap-4 transition duration-300">
                                    <div class="w-10 h-10 rounded-full bg-berta-wood/10 flex items-center justify-center text-berta-wood font-bold text-sm border border-berta-wood/20 group-hover:bg-berta-wood group-hover:text-white transition">T</div>
                                    <div>
                                        <h4 class="text-xs font-bold text-berta-sage uppercase tracking-wider mb-1">Sebelah Timur</h4>
                                        <p class="text-berta-cream font-medium">Desa Sirkandi <span class="text-berta-sage text-xs font-normal">(Kec. Purwareja Klampok)</span></p>
                                    </div>
                                </div>
                                <div class="group flex items-start gap-4 transition duration-300">
                                    <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold text-sm border border-blue-500/20 group-hover:bg-blue-500 group-hover:text-white transition">B</div>
                                    <div>
                                        <h4 class="text-xs font-bold text-berta-sage uppercase tracking-wider mb-1">Sebelah Barat</h4>
                                        <p class="text-berta-cream font-medium">Desa Derik & Desa Karangjati</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative">
            <div class="absolute inset-0 bg-white/5 rounded-[3rem] transform -rotate-1 scale-[1.02] opacity-50"></div>
            <div class="bg-gradient-to-b from-white/5 to-transparent rounded-[3rem] p-8 md:p-16 border border-berta-sage/10 relative overflow-hidden backdrop-blur-sm">
                
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
                    <div>
                        <h3 class="text-3xl font-bold text-berta-cream mb-8 font-playfair">Demografi Penduduk</h3>
                        
                        <div class="bg-berta-dark p-8 rounded-3xl border border-berta-sage/10 flex items-center justify-between mb-8 shadow-lg">
                            <div>
                                <span class="text-berta-sage text-sm font-bold uppercase tracking-widest block mb-2">Total Populasi</span>
                                <span class="text-5xl font-bold text-white tracking-tight">4.016 <span class="text-lg text-berta-olive font-normal">Jiwa</span></span>
                            </div>
                            <div class="w-16 h-16 bg-berta-olive/20 rounded-full flex items-center justify-center text-3xl">👥</div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-berta-dark p-6 rounded-3xl border border-berta-sage/10 text-center hover:border-blue-500/30 transition duration-300">
                                <div class="w-12 h-12 bg-blue-500/10 rounded-full flex items-center justify-center text-blue-400 text-xl mx-auto mb-3">♂</div>
                                <span class="block text-2xl font-bold text-white">2.005</span>
                                <span class="text-xs text-berta-sage uppercase tracking-wider">Laki-Laki</span>
                            </div>
                            <div class="bg-berta-dark p-6 rounded-3xl border border-berta-sage/10 text-center hover:border-pink-500/30 transition duration-300">
                                <div class="w-12 h-12 bg-pink-500/10 rounded-full flex items-center justify-center text-pink-400 text-xl mx-auto mb-3">♀</div>
                                <span class="block text-2xl font-bold text-white">1.961</span>
                                <span class="text-xs text-berta-sage uppercase tracking-wider">Perempuan</span>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3 class="text-3xl font-bold text-berta-cream mb-8 font-playfair">Tingkat Pendidikan</h3>
                        <div class="space-y-8 bg-berta-dark/50 p-8 rounded-3xl border border-berta-sage/10">
                            
                            <div class="group">
                                <div class="flex justify-between items-end mb-2">
                                    <span class="text-berta-cream font-medium">SD / Sederajat</span>
                                    <span class="text-2xl font-bold text-berta-olive">38%</span>
                                </div>
                                <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-berta-olive to-berta-sage h-full rounded-full w-0 animate-progress" style="width: 38%"></div>
                                </div>
                            </div>

                            <div class="group">
                                <div class="flex justify-between items-end mb-2">
                                    <span class="text-berta-cream font-medium">SMP / Sederajat</span>
                                    <span class="text-2xl font-bold text-berta-wood">30%</span>
                                </div>
                                <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-berta-wood to-yellow-600 h-full rounded-full w-0 animate-progress" style="width: 30%; animation-delay: 0.2s;"></div>
                                </div>
                            </div>

                            <div class="group">
                                <div class="flex justify-between items-end mb-2">
                                    <span class="text-berta-cream font-medium">SMA / SMK</span>
                                    <span class="text-2xl font-bold text-blue-400">22%</span>
                                </div>
                                <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-blue-600 to-blue-400 h-full rounded-full w-0 animate-progress" style="width: 22%; animation-delay: 0.4s;"></div>
                                </div>
                            </div>

                            <div class="group">
                                <div class="flex justify-between items-end mb-2">
                                    <span class="text-berta-cream font-medium">Sarjana (S1)</span>
                                    <span class="text-2xl font-bold text-purple-400">10%</span>
                                </div>
                                <div class="w-full bg-black/40 rounded-full h-3 overflow-hidden">
                                    <div class="bg-gradient-to-r from-purple-600 to-purple-400 h-full rounded-full w-0 animate-progress" style="width: 10%; animation-delay: 0.6s;"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="text-center mb-16 max-w-3xl mx-auto">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block">Kearifan Lokal</span>
                <h2 class="text-4xl font-bold text-berta-cream mb-6 font-playfair">Harmoni Ekonomi & Budaya</h2>
                <p class="text-berta-sage text-lg">Sinergi antara geliat ekonomi kerakyatan yang mandiri dan pelestarian budaya leluhur yang tak lekang oleh waktu.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="group relative overflow-hidden rounded-[2.5rem]">
                    <div class="absolute inset-0 bg-berta-wood/20 group-hover:bg-berta-wood/30 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1595837946626-72944b9347d4?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-20 group-hover:scale-110 transition duration-700" alt="Ekonomi">
                    
                    <div class="relative p-10 h-full border border-berta-sage/10 rounded-[2.5rem] flex flex-col justify-between min-h-[400px]">
                        <div>
                            <div class="w-16 h-16 bg-berta-wood rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-berta-wood/20">🌱</div>
                            <h3 class="text-2xl font-bold text-berta-cream mb-4">Ekonomi & UMKM</h3>
                            <p class="text-berta-taupe leading-relaxed mb-6">
                                Tulang punggung perekonomian desa ditopang oleh sektor pertanian dan industri kreatif rumahan yang terus berkembang.
                            </p>
                        </div>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3 text-berta-cream/90 bg-black/20 p-3 rounded-xl border border-white/5 hover:bg-white/10 transition">
                                <span class="text-berta-wood">●</span> Kerajinan Anyaman Piti
                            </li>
                            <li class="flex items-center gap-3 text-berta-cream/90 bg-black/20 p-3 rounded-xl border border-white/5 hover:bg-white/10 transition">
                                <span class="text-berta-wood">●</span> Gula Kelapa Murni (Kristal/Cetak)
                            </li>
                            <li class="flex items-center gap-3 text-berta-cream/90 bg-black/20 p-3 rounded-xl border border-white/5 hover:bg-white/10 transition">
                                <span class="text-berta-wood">●</span> Industri Mebeler & Makanan Ringan
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="group relative overflow-hidden rounded-[2.5rem]">
                    <div class="absolute inset-0 bg-berta-olive/20 group-hover:bg-berta-olive/30 transition duration-500"></div>
                    <img src="https://images.unsplash.com/photo-1516820208784-270b250306e3?q=80&w=1969&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-20 group-hover:scale-110 transition duration-700" alt="Budaya">
                    
                    <div class="relative p-10 h-full border border-berta-sage/10 rounded-[2.5rem] flex flex-col justify-between min-h-[400px]">
                        <div>
                            <div class="w-16 h-16 bg-berta-olive rounded-2xl flex items-center justify-center text-3xl mb-6 shadow-lg shadow-berta-olive/20">🎭</div>
                            <h3 class="text-2xl font-bold text-berta-cream mb-4">Sosial Budaya</h3>
                            <p class="text-berta-taupe leading-relaxed mb-6">
                                Warisan leluhur yang dijaga dengan penuh khidmat sebagai wujud syukur kepada Sang Pencipta dan perekat tali persaudaraan.
                            </p>
                        </div>
                        <div class="grid grid-cols-2 gap-3">
                            <div class="text-center p-4 bg-black/20 rounded-2xl border border-white/5 hover:bg-white/10 transition group/item">
                                <span class="block text-2xl mb-1 group-hover/item:scale-125 transition duration-300">🎉</span>
                                <span class="text-sm font-bold text-berta-cream">Tradisi Suran</span>
                            </div>
                            <div class="text-center p-4 bg-black/20 rounded-2xl border border-white/5 hover:bg-white/10 transition group/item">
                                <span class="block text-2xl mb-1 group-hover/item:scale-125 transition duration-300">🙏</span>
                                <span class="text-sm font-bold text-berta-cream">Sadran</span>
                            </div>
                            <div class="text-center p-4 bg-black/20 rounded-2xl border border-white/5 hover:bg-white/10 transition group/item">
                                <span class="block text-2xl mb-1 group-hover/item:scale-125 transition duration-300">🌾</span>
                                <span class="text-sm font-bold text-berta-cream">Sedekah Bumi</span>
                            </div>
                            <div class="text-center p-4 bg-black/20 rounded-2xl border border-white/5 hover:bg-white/10 transition group/item">
                                <span class="block text-2xl mb-1 group-hover/item:scale-125 transition duration-300">🍛</span>
                                <span class="text-sm font-bold text-berta-cream">Tumpengan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="relative rounded-3xl overflow-hidden p-1">
            <div class="absolute inset-0 bg-gradient-to-r from-berta-olive via-berta-wood to-berta-olive animate-gradient-x"></div>
            <div class="relative bg-berta-dark rounded-[1.3rem] p-10 md:p-16 text-center">
                <h3 class="text-3xl font-bold mb-6 text-transparent bg-clip-text bg-gradient-to-r from-berta-cream to-white font-playfair">Menuju Desa Digital yang Mandiri</h3>
                <blockquote class="text-xl text-berta-sage/90 max-w-4xl mx-auto italic font-light leading-relaxed">
                    "Perkembangan teknologi yang pesat dimanfaatkan oleh Pemerintah Desa Berta sebagai sarana promosi potensi desa, produk unggulan UMKM, hingga destinasi wisata. Website ini adalah langkah nyata kami untuk mendekatkan pelayanan dan informasi kepada seluruh masyarakat."
                </blockquote>
                <div class="mt-8 flex justify-center">
                    <img src="{{ asset('img/logo.png') }}" class="h-16 w-auto opacity-50 grayscale hover:grayscale-0 transition duration-500" alt="Logo">
                </div>
            </div>
        </div>

    </div>

    @include('components.footer')

    <style>
        @keyframes progress { from { width: 0; } }
        .animate-progress { animation: progress 1.5s ease-out forwards; }
        
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        
        @keyframes gradientX { 0% { background-position: 0% 50%; } 50% { background-position: 100% 50%; } 100% { background-position: 0% 50%; } }
        .animate-gradient-x { background-size: 200% 200%; animation: gradientX 3s ease infinite; }
    </style>

</body>
</html>