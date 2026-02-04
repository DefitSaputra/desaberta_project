<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Potensi Desa - Desa Berta</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
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

    {{-- HERO SECTION --}}
    <div class="relative h-[85vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/potensidesa.jpeg') }}" 
                 class="w-full h-full object-cover object-center fixed top-0 left-0 -z-10 brightness-50" 
                 alt="Potensi Desa Berta">
            
            {{-- Overlay Gradasi --}}
            <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/30 to-berta-dark/50"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Teks Hero --}}
        <div class="relative z-10 text-center px-4 max-w-5xl mx-auto pt-24 pb-48 md:pb-32">
            <span class="inline-block py-2 px-6 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-bold tracking-[0.2em] uppercase mb-6 text-white opacity-0 animate-fade-in-down">
                Kekayaan Alam & Kreativitas Warga
            </span>
            <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 font-playfair leading-tight drop-shadow-2xl opacity-0 animate-fade-in-up delay-100">
                Potensi Unggulan <br> <span class="text-berta-olive italic">Desa Berta</span>
            </h1>
            <p class="text-xl text-white/90 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Menjelajahi sentra ekonomi kreatif, hasil bumi agroindustri, dan kearifan lokal yang menjadi denyut nadi kehidupan masyarakat.
            </p>
        </div>
    </div>

    {{-- KONTEN UTAMA --}}
    <div class="relative z-20 bg-berta-dark -mt-24 rounded-t-[3rem] shadow-[0_-20px_60px_-15px_rgba(0,0,0,0.5)] pt-24 pb-24 px-4 sm:px-6 lg:px-8 overflow-hidden">
        
        {{-- Dekorasi Background --}}
        <div class="absolute top-0 left-0 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 pointer-events-none"></div>
        <div class="absolute top-40 right-[-10%] w-[600px] h-[600px] bg-berta-wood/5 rounded-full blur-[120px] pointer-events-none"></div>

        {{-- SEKTOR 1: EKONOMI KREATIF (ANYAMAN) --}}
        <div class="max-w-7xl mx-auto mb-32">
            <div class="flex flex-col md:flex-row items-end gap-6 mb-12 border-b border-berta-sage/10 pb-8 scroll-element opacity-0 translate-y-8">
                <div>
                    <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-2 block">Sektor Unggulan</span>
                    <h2 class="text-4xl font-bold text-berta-cream font-playfair">Ekonomi Kreatif & Kriya</h2>
                </div>
                <p class="text-berta-sage/80 max-w-xl md:text-right md:ml-auto leading-relaxed">
                    Transformasi bahan baku lokal bambu dan kayu menjadi produk bernilai seni tinggi yang menembus pasar modern.
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
                {{-- Gambar Besar --}}
                <div class="lg:col-span-8 group relative rounded-[2rem] overflow-hidden h-[500px] shadow-2xl scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500 z-10"></div>
                    <img src="{{ asset('img/anyaman.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-1000 group-hover:scale-110" alt="Pengrajin Anyaman">
                    
                    <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-black/90 via-black/60 to-transparent z-20">
                        <h3 class="text-3xl font-bold text-white mb-3">Sentra Anyaman Bambu</h3>
                        <p class="text-white/90 line-clamp-2 mb-5 leading-relaxed font-light">
                            Produk anyaman besek dan "piti" menjadi komoditas andalan yang dikerjakan oleh tangan-tangan terampil warga.
                        </p>
                        <div class="flex gap-3">
                            <span class="px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-xs font-bold text-white border border-white/20 uppercase tracking-wider">Handmade</span>
                            <span class="px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-xs font-bold text-white border border-white/20 uppercase tracking-wider">Eco-Friendly</span>
                        </div>
                    </div>
                </div>

                {{-- Gambar Kecil --}}
                <div class="lg:col-span-4 flex flex-col gap-8">
                    <div class="relative flex-1 rounded-[2rem] overflow-hidden group shadow-xl h-[230px] scroll-element opacity-0 translate-y-8 transition-delay-300">
                        <img src="{{ asset('img/tas_anyaman.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Tas Anyaman">
                        <div class="absolute inset-0 bg-black/40 group-hover:bg-black/20 transition duration-500"></div>
                        <div class="absolute bottom-6 left-6 z-10">
                            <h4 class="text-xl font-bold text-white">Inovasi Tas Anyaman</h4>
                            <p class="text-sm text-white/80 mt-1">Bernilai estetika & fungsional</p>
                        </div>
                    </div>
                    <div class="relative flex-1 rounded-[2rem] overflow-hidden group shadow-xl h-[230px] scroll-element opacity-0 translate-y-8 transition-delay-400">
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

        {{-- SEKTOR 2: AGROINDUSTRI --}}
        <div class="max-w-7xl mx-auto mb-32">
            <div class="text-center mb-16 scroll-element opacity-0 translate-y-8">
                <span class="text-berta-wood font-bold tracking-widest uppercase text-sm mb-3 block">Hasil Bumi</span>
                <h2 class="text-4xl md:text-5xl font-bold text-berta-cream font-playfair">Agroindustri & Kuliner</h2>
                <div class="w-24 h-1 bg-berta-wood mx-auto mt-6 rounded-full opacity-50"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-32">
                <div class="order-2 md:order-1 space-y-8 scroll-element opacity-0 translate-y-8">
                    <div class="w-20 h-20 rounded-3xl bg-berta-wood/10 border border-berta-wood/20 flex items-center justify-center text-4xl shadow-lg">🥥</div>
                    <div>
                        <h3 class="text-3xl font-bold text-berta-cream mb-4">Gula Kelapa & Gula Semut</h3>
                        <p class="text-berta-taupe text-lg leading-relaxed text-justify">
                            Dikenal dengan kualitas nira yang manis alami, Desa Berta memproduksi <strong>Gula Jawa (Cetak)</strong> dan <strong>Gula Semut (Kristal)</strong> yang diminati pasar ekspor karena kepraktisan dan kualitas organiknya.
                        </p>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="text-berta-wood text-xl">✨</span>
                            <span class="text-berta-sage font-medium">Tanpa Bahan Pengawet (Organik)</span>
                        </li>
                        <li class="flex items-center gap-4 p-4 rounded-xl bg-white/5 border border-white/5 hover:bg-white/10 transition duration-300">
                            <span class="text-berta-wood text-xl">🛡️</span>
                            <span class="text-berta-sage font-medium">Proses Produksi Higienis</span>
                        </li>
                    </ul>
                </div>
                <div class="order-1 md:order-2 relative group scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <div class="absolute inset-0 bg-berta-wood rounded-[2.5rem] transform rotate-3 opacity-10 group-hover:rotate-6 transition duration-700"></div>
                    <div class="relative rounded-[2.5rem] overflow-hidden h-[500px] shadow-2xl border border-white/10">
                        <img src="{{ asset('img/gulajawa.jpeg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="Gula Jawa">
                        <div class="absolute -bottom-12 -left-12 w-56 h-56 rounded-[2rem] overflow-hidden border-8 border-berta-dark shadow-2xl hidden lg:block hover:scale-105 transition duration-500">
                            <img src="{{ asset('img/gula_semut.jpeg') }}" class="w-full h-full object-cover" alt="Gula Semut">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Camilan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
                <div class="relative group scroll-element opacity-0 translate-y-8">
                    <div class="absolute inset-0 bg-berta-olive rounded-[2.5rem] transform -rotate-3 opacity-10 group-hover:-rotate-6 transition duration-700"></div>
                    <div class="relative rounded-[2.5rem] overflow-hidden h-[450px] shadow-2xl border border-white/10">
                        <img src="{{ asset('img/keripik.jpeg') }}" class="w-full h-full object-cover transition duration-700 group-hover:scale-105" alt="Keripik Tradisional">
                    </div>
                </div>
                <div class="space-y-8 scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <div class="w-20 h-20 rounded-3xl bg-berta-olive/10 border border-berta-olive/20 flex items-center justify-center text-4xl shadow-lg">🍟</div>
                    <div>
                        <h3 class="text-3xl font-bold text-berta-cream mb-4">Camilan & Makanan Ringan</h3>
                        <p class="text-berta-taupe text-lg leading-relaxed text-justify">
                            UMKM Desa Berta aktif mengolah hasil pertanian menjadi makanan ringan bernilai tambah. Mulai dari aneka <strong>Keripik</strong> (Singkong, Pisang, Talas) hingga Rengginang yang renyah dan gurih.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEKTOR 3: PERTANIAN --}}
        <div class="max-w-7xl mx-auto mb-32 scroll-element opacity-0 translate-y-8">
            <div class="bg-gradient-to-br from-white/5 to-white/0 rounded-[3rem] p-10 md:p-16 border border-berta-sage/10 relative overflow-hidden backdrop-blur-sm">
                <div class="absolute top-0 right-0 w-96 h-96 bg-berta-olive/10 blur-[120px] rounded-full pointer-events-none"></div>
                
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">
                    <div class="lg:col-span-1 space-y-6">
                        <h3 class="text-3xl font-bold text-berta-cream font-playfair leading-tight">Pertanian & <br> Ketahanan Pangan</h3>
                        <p class="text-berta-sage leading-relaxed">
                            Sektor pertanian menjadi fondasi utama ekonomi desa, didukung oleh peran aktif BUMDes dalam menjaga stabilitas pangan.
                        </p>
                        <div class="p-6 bg-berta-dark/80 rounded-2xl border border-berta-sage/20 shadow-lg">
                            <h4 class="text-xl font-bold text-white mb-2">BUMDes "Jaya Mukti"</h4>
                            <p class="text-sm text-berta-sage/80 leading-relaxed">
                                Badan usaha milik desa yang berfokus pada penyerapan gabah petani untuk menjaga stabilitas harga dan ketahanan pangan desa.
                            </p>
                        </div>
                    </div>
                    <div class="lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="p-6 rounded-2xl bg-berta-dark/40 border border-white/5 hover:bg-white/5 transition duration-300">
                            <div class="text-4xl mb-4">🌾</div>
                            <h5 class="text-white font-bold text-lg mb-2">Lumbung Padi</h5>
                            <p class="text-sm text-berta-sage leading-relaxed">Mayoritas lahan digunakan untuk pertanian padi sawah yang subur.</p>
                        </div>
                        <div class="p-6 rounded-2xl bg-berta-dark/40 border border-white/5 hover:bg-white/5 transition duration-300">
                            <div class="text-4xl mb-4">🪵</div>
                            <h5 class="text-white font-bold text-lg mb-2">Hasil Hutan</h5>
                            <p class="text-sm text-berta-sage leading-relaxed">Potensi kayu dan bambu yang melimpah sebagai bahan baku kriya dan bangunan.</p>
                        </div>
                        <div class="p-6 rounded-2xl bg-berta-dark/40 border border-white/5 hover:bg-white/5 transition duration-300 sm:col-span-2">
                            <div class="text-4xl mb-4">🪑</div>
                            <h5 class="text-white font-bold text-lg mb-2">Mebeler</h5>
                            <p class="text-sm text-berta-sage leading-relaxed">Pengrajin furnitur kayu lokal dengan kualitas yang bersaing dan desain autentik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SEKTOR 4: BUDAYA --}}
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 scroll-element opacity-0 translate-y-8">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-3 block">Tradisi Leluhur</span>
                <h2 class="text-4xl md:text-5xl font-bold text-berta-cream font-playfair">Pesona Budaya & Wisata</h2>
                <div class="w-24 h-1 bg-berta-olive mx-auto mt-6 rounded-full opacity-50"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                {{-- Card 1 --}}
                <div class="group relative rounded-[2rem] overflow-hidden h-[350px] shadow-xl border border-white/5 scroll-element opacity-0 translate-y-8">
                    <img src="{{ asset('img/sedekahbumi.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Sedekah Bumi">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <h4 class="text-2xl font-bold text-white mb-2">Sedekah Bumi</h4>
                        <p class="text-white/80 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Wujud syukur warga atas hasil panen yang melimpah dan doa untuk kesejahteraan.</p>
                    </div>
                </div>
                {{-- Card 2 --}}
                <div class="group relative rounded-[2rem] overflow-hidden h-[350px] shadow-xl border border-white/5 scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <img src="{{ asset('img/tradisisuran.jpg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Suran">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <h4 class="text-2xl font-bold text-white mb-2">Tradisi Suran</h4>
                        <p class="text-white/80 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Peringatan tahun baru Islam/Jawa dengan kegiatan spiritual dan sosial.</p>
                    </div>
                </div>
                {{-- Card 3 --}}
                <div class="group relative rounded-[2rem] overflow-hidden h-[350px] shadow-xl border border-white/5 scroll-element opacity-0 translate-y-8 transition-delay-300">
                    <img src="{{ asset('img/potensidesa.jpeg') }}" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110" alt="Sadran">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-black/50 to-transparent opacity-90"></div>
                    <div class="absolute bottom-0 left-0 p-8 transform translate-y-2 group-hover:translate-y-0 transition duration-500">
                        <h4 class="text-2xl font-bold text-white mb-2">Sadran</h4>
                        <p class="text-white/80 text-sm leading-relaxed opacity-0 group-hover:opacity-100 transition duration-500 delay-100">Tradisi mendoakan leluhur dan gotong royong membersihkan makam jelang Ramadhan.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('components.footer')

    {{-- Script untuk Animasi Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // Muncul ketika 10% elemen terlihat
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8'); // Hapus state awal
                        entry.target.classList.add('opacity-100', 'translate-y-0'); // Tambah state akhir
                        observer.unobserve(entry.target); // Stop observe setelah muncul
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.scroll-element').forEach(el => {
                observer.observe(el);
            });
        });
    </script>

    <style>
        /* Definisi Animasi */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 1s ease-out forwards; }
        
        .delay-100 { animation-delay: 0.2s; }
        .delay-200 { animation-delay: 0.4s; }

        /* Smooth transition untuk elemen scroll */
        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 1000ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Helper delay classes */
        .transition-delay-200 { transition-delay: 200ms; }
        .transition-delay-300 { transition-delay: 300ms; }
        .transition-delay-400 { transition-delay: 400ms; }
    </style>

</body>
</html>