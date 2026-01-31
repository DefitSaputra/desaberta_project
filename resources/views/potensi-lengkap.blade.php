<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Potensi Desa - Desa Berta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .text-shadow { text-shadow: 0 2px 4px rgba(0,0,0,0.5); }
    </style>
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white">

    @include('components.navbar')

    <div class="relative h-[70vh] flex items-center justify-center overflow-hidden">
        <div class="absolute inset-0">
            <img src="{{ asset('img/bgbaru.jpeg') }}" class="w-full h-full object-cover fixed top-0 left-0 -z-10 brightness-[0.4]" alt="Potensi Desa Berta">
            <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-transparent to-berta-dark/50"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto" x-data="{ show: false }" x-init="setTimeout(() => show = true, 300)">
            <span class="inline-block py-1.5 px-6 rounded-full bg-berta-olive/20 backdrop-blur-md border border-berta-olive/30 text-xs font-bold tracking-[0.2em] uppercase mb-6 text-berta-cream transition-all duration-1000 transform"
                  :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                Kekayaan Alam & Kreativitas Warga
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 font-playfair leading-tight transition-all duration-1000 delay-300 transform"
                :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                Potensi Unggulan <br> <span class="text-berta-olive italic">Desa Berta</span>
            </h1>
            <p class="text-xl text-white/80 max-w-2xl mx-auto font-light leading-relaxed transition-all duration-1000 delay-500 transform"
               :class="show ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-4'">
                Menjelajahi sentra ekonomi kreatif, hasil bumi agroindustri, dan kearifan lokal yang menjadi denyut nadi kehidupan masyarakat.
            </p>
        </div>
    </div>

    <div class="relative z-20 bg-berta-dark -mt-20 rounded-t-[3rem] shadow-[0_-20px_60px_-15px_rgba(0,0,0,0.5)] pt-24 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
        
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 pointer-events-none"></div>
        <div class="absolute top-40 right-[-10%] w-[600px] h-[600px] bg-berta-wood/5 rounded-full blur-[120px] pointer-events-none"></div>

        <div class="max-w-7xl mx-auto mb-32">
            <div class="flex flex-col md:flex-row items-end gap-6 mb-12 border-b border-berta-sage/10 pb-8">
                <div>
                    <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-2 block">Sektor Unggulan</span>
                    <h2 class="text-4xl font-bold text-berta-cream font-playfair">Ekonomi Kreatif & Kriya</h2>
                </div>
                <p class="text-berta-sage/80 max-w-xl md:text-right md:ml-auto">
                    Transformasi bahan baku lokal bambu dan kayu menjadi produk bernilai seni tinggi yang menembus pasar modern.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                <div class="lg:col-span-8 group relative rounded-[2rem] overflow-hidden h-[500px]">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500 z-10"></div>
                    <img src="{{ asset('img/anyaman.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Pengrajin Anyaman">
                    <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/90 via-black/50 to-transparent z-20">
                        <h3 class="text-3xl font-bold text-white mb-2">Sentra Anyaman Bambu (Besek & Piti)</h3>
                        <p class="text-white/80 line-clamp-2 mb-4">
                            Produk anyaman besek dan "piti" menjadi komoditas andalan yang dikerjakan oleh tangan-tangan terampil warga sebagai mata pencaharian utama maupun sampingan. Produk ini telah dipasarkan ke berbagai wilayah sekitar Banjarnegara.
                        </p>
                        <div class="flex gap-3">
                            <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs text-white border border-white/20">Handmade</span>
                            <span class="px-3 py-1 rounded-full bg-white/20 backdrop-blur-md text-xs text-white border border-white/20">Eco-Friendly</span>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 flex flex-col gap-8">
                    <div class="relative flex-1 rounded-[2rem] overflow-hidden group">
                        <img src="{{ asset('img/tas_anyaman.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Tas Anyaman">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition duration-500"></div>
                        <div class="absolute bottom-6 left-6 z-10">
                            <h4 class="text-xl font-bold text-white">Inovasi Tas Anyaman</h4>
                            <p class="text-sm text-white/80 mt-1">Bernilai estetika & fungsional</p>
                        </div>
                    </div>
                    <div class="relative flex-1 rounded-[2rem] overflow-hidden group">
                        <img src="{{ asset('img/kerajinan_anyaman.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Kerajinan Kreatif">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition duration-500"></div>
                        <div class="absolute bottom-6 left-6 z-10">
                            <h4 class="text-xl font-bold text-white">Aneka Souvenir</h4>
                            <p class="text-sm text-white/80 mt-1">Wadah unik & dekorasi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto mb-32">
            <div class="text-center mb-16">
                <span class="text-berta-wood font-bold tracking-widest uppercase text-sm mb-2 block">Hasil Bumi</span>
                <h2 class="text-4xl font-bold text-berta-cream font-playfair">Agroindustri & Kuliner</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mb-24">
                <div class="order-2 md:order-1 space-y-6">
                    <div class="w-16 h-16 rounded-2xl bg-berta-wood/20 flex items-center justify-center text-3xl mb-4">🥥</div>
                    <h3 class="text-3xl font-bold text-berta-cream">Gula Kelapa & Gula Semut</h3>
                    <p class="text-berta-taupe text-lg leading-relaxed text-justify">
                        Dikenal dengan kualitas nira yang manis alami, Desa Berta memproduksi <strong>Gula Jawa (Cetak)</strong> dan <strong>Gula Semut (Kristal)</strong>. Gula semut menjadi primadona baru karena kepraktisannya dan kadar air yang rendah, sehingga lebih tahan lama dan diminati pasar ekspor maupun swalayan modern.
                    </p>
                    <ul class="space-y-3 mt-4">
                        <li class="flex items-center gap-3 text-berta-sage"><svg class="w-5 h-5 text-berta-wood" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Tanpa Bahan Pengawet (Organik)</li>
                        <li class="flex items-center gap-3 text-berta-sage"><svg class="w-5 h-5 text-berta-wood" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg> Proses Higienis</li>
                    </ul>
                </div>
                <div class="order-1 md:order-2 relative group">
                    <div class="absolute inset-0 bg-berta-wood rounded-[2rem] transform rotate-3 opacity-20 group-hover:rotate-6 transition duration-500"></div>
                    <div class="relative rounded-[2rem] overflow-hidden h-[400px] shadow-2xl">
                        <img src="{{ asset('img/gulajawa.jpeg') }}" class="w-full h-full object-cover" alt="Gula Jawa">
                        <div class="absolute -bottom-10 -left-10 w-48 h-48 rounded-2xl overflow-hidden border-4 border-berta-dark shadow-xl hidden lg:block">
                            <img src="{{ asset('img/gula_semut.jpeg') }}" class="w-full h-full object-cover" alt="Gula Semut">
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="relative group">
                    <div class="absolute inset-0 bg-berta-olive rounded-[2rem] transform -rotate-3 opacity-20 group-hover:-rotate-6 transition duration-500"></div>
                    <div class="relative rounded-[2rem] overflow-hidden h-[400px] shadow-2xl">
                        <img src="{{ asset('img/keripik.jpeg') }}" class="w-full h-full object-cover" alt="Keripik Tradisional">
                    </div>
                </div>
                <div class="space-y-6">
                    <div class="w-16 h-16 rounded-2xl bg-berta-olive/20 flex items-center justify-center text-3xl mb-4">🍟</div>
                    <h3 class="text-3xl font-bold text-berta-cream">Camilan & Makanan Ringan</h3>
                    <p class="text-berta-taupe text-lg leading-relaxed text-justify">
                        UMKM Desa Berta juga aktif mengolah hasil pertanian menjadi makanan ringan bernilai tambah. Mulai dari aneka <strong>Keripik</strong> (Singkong, Pisang, Talas) hingga Rengginang. Produk-produk ini menjadi oleh-oleh khas yang wajib dibawa pulang saat berkunjung.
                    </p>
                    <a href="#" class="inline-flex items-center gap-2 text-berta-olive font-bold hover:text-white transition">
                        Pesan Produk UMKM <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto mb-32">
            <div class="bg-gradient-to-br from-white/5 to-white/0 rounded-[2.5rem] p-10 border border-berta-sage/10 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-96 h-96 bg-berta-olive/10 blur-[100px] rounded-full pointer-events-none"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <div class="lg:col-span-1">
                        <h3 class="text-3xl font-bold text-berta-cream font-playfair mb-4">Pertanian & <br> Ketahanan Pangan</h3>
                        <p class="text-berta-sage mb-6">
                            Sektor pertanian menjadi fondasi utama ekonomi desa, didukung oleh peran aktif BUMDes.
                        </p>
                        <div class="p-6 bg-berta-dark rounded-2xl border border-berta-sage/20">
                            <h4 class="text-xl font-bold text-white mb-2">BUMDes "Jaya Mukti"</h4>
                            <p class="text-sm text-berta-sage/80">
                                Badan usaha milik desa yang berfokus pada penyerapan gabah petani untuk menjaga stabilitas harga dan ketahanan pangan desa.
                            </p>
                        </div>
                    </div>
                    <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-berta-dark/50 border border-white/5">
                            <div class="text-3xl">🌾</div>
                            <div>
                                <h5 class="text-white font-bold">Lumbung Padi</h5>
                                <p class="text-xs text-berta-sage mt-1">Mayoritas lahan digunakan untuk pertanian padi sawah.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-berta-dark/50 border border-white/5">
                            <div class="text-3xl">🪵</div>
                            <div>
                                <h5 class="text-white font-bold">Hasil Hutan</h5>
                                <p class="text-xs text-berta-sage mt-1">Potensi kayu dan bambu yang melimpah sebagai bahan baku kriya.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4 p-4 rounded-xl bg-berta-dark/50 border border-white/5">
                            <div class="text-3xl">🪑</div>
                            <div>
                                <h5 class="text-white font-bold">Mebeler</h5>
                                <p class="text-xs text-berta-sage mt-1">Pengrajin furnitur kayu lokal dengan kualitas yang bersaing.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-2 block">Tradisi Leluhur</span>
                <h2 class="text-4xl font-bold text-berta-cream font-playfair">Pesona Budaya & Wisata</h2>
                <div class="w-24 h-1 bg-berta-olive mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group relative rounded-3xl overflow-hidden h-[300px]">
                    <img src="https://images.unsplash.com/photo-1605646399691-372922756372?q=80&w=2070&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0" alt="Sedekah Bumi">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-2xl font-bold text-white mb-2">Sedekah Bumi</h4>
                        <p class="text-white/80 text-sm">Wujud syukur warga atas hasil panen yang melimpah.</p>
                    </div>
                </div>
                <div class="group relative rounded-3xl overflow-hidden h-[300px]">
                    <img src="https://images.unsplash.com/photo-1542358899-73e461622323?q=80&w=2069&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0" alt="Suran">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-2xl font-bold text-white mb-2">Tradisi Suran</h4>
                        <p class="text-white/80 text-sm">Peringatan tahun baru Islam/Jawa dengan kegiatan spiritual dan sosial.</p>
                    </div>
                </div>
                <div class="group relative rounded-3xl overflow-hidden h-[300px]">
                    <img src="https://images.unsplash.com/photo-1590059393160-c36b443292d3?q=80&w=2002&auto=format&fit=crop" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 grayscale group-hover:grayscale-0" alt="Sadran">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/40 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8">
                        <h4 class="text-2xl font-bold text-white mb-2">Sadran</h4>
                        <p class="text-white/80 text-sm">Tradisi mendoakan leluhur menjelang bulan suci Ramadhan.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('components.footer')

</body>
</html>