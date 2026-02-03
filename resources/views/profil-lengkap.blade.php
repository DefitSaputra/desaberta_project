<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Wilayah & Sejarah - Desa Berta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400&family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION --}}
    <div class="relative h-[60vh] overflow-hidden flex items-center justify-center">
        <div class="absolute inset-0">
            {{-- Background Header --}}
            <img src="{{ asset('img/pw.jpg') }}" class="w-full h-full object-cover fixed top-0 left-0 -z-10 brightness-50" alt="Desa Berta">
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/60 via-berta-dark/20 to-berta-dark"></div>
        </div>
        
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto pt-20">
            <span class="inline-block py-1.5 px-6 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-xs font-bold tracking-[0.2em] uppercase mb-6 text-berta-cream opacity-0 animate-fade-in-down">
                Profil Wilayah
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 drop-shadow-2xl font-playfair leading-tight opacity-0 animate-fade-in-up delay-100">
                Identitas & Jejak Langkah <br> <span class="text-berta-olive italic">Desa Berta</span>
            </h1>
            <p class="text-lg text-white/90 max-w-2xl mx-auto font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Menjelajahi keindahan geografis, batas wilayah, dan akar sejarah panjang dari masa Kerajaan Mataram Kuno hingga kini.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-32 relative z-10 bg-berta-dark rounded-t-[3rem] -mt-20 shadow-[0_-20px_60px_-15px_rgba(0,0,0,0.5)]">

        {{-- 1. GAMBARAN UMUM (REDESIGNED WITH profildesa.jpg) --}}
        <section class="relative">
            <div class="absolute -top-20 -left-20 w-64 h-64 bg-berta-olive/10 rounded-full blur-[80px] pointer-events-none"></div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-start">
                
                {{-- KOLOM KIRI: TEKS DESKRIPSI --}}
                <div class="lg:col-span-7 space-y-8 text-berta-taupe/90 text-lg leading-relaxed text-justify scroll-element opacity-0 translate-y-8">
                    <div class="flex items-center gap-4 mb-2">
                        <div class="h-1 w-12 bg-berta-olive rounded-full"></div>
                        <span class="text-berta-olive font-bold tracking-widest uppercase text-sm">Gambaran Umum</span>
                    </div>
                    <h2 class="text-4xl font-bold text-berta-cream mb-6 font-playfair">Permata Tersembunyi di Banjarnegara</h2>
                    <p>
                        <strong class="text-berta-cream">Desa Berta</strong> bukan sekadar wilayah administratif, melainkan sebuah ekosistem kehidupan yang harmonis. Terbentang seluas <strong>478,450 Hektar</strong>, desa ini memadukan lanskap dataran rendah yang subur untuk pertanian dengan kontur perbukitan yang sejuk dan asri.
                    </p>
                    <p>
                        Secara administratif, denyut nadi kehidupan desa tersebar di <strong class="text-berta-cream">5 Dusun</strong> utama. Kelima dusun ini saling terhubung dalam semangat gotong royong:
                    </p>
                    
                    {{-- Daftar Dusun --}}
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

                {{-- KOLOM KANAN: FOTO UTAMA & BATAS WILAYAH --}}
                <div class="lg:col-span-5 lg:sticky lg:top-32 relative scroll-element opacity-0 translate-y-8 transition-delay-200">
                    
                    {{-- [BARU] FOTO profildesa.jpg --}}
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl border border-white/10 group mb-[-4rem] z-0">
                        <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-transparent to-transparent opacity-80 z-10"></div>
                        <img src="{{ asset('img/profildesa.jpg') }}" alt="Suasana Desa Berta" class="w-full h-[500px] object-cover transform group-hover:scale-105 transition duration-1000 ease-in-out">
                    </div>

                    {{-- KARTU BATAS WILAYAH (OVERLAY) --}}
                    <div class="relative z-10 mx-4">
                        <div class="bg-berta-dark/80 backdrop-blur-xl border border-white/10 rounded-[2rem] p-8 shadow-lg">
                            <h3 class="text-xl font-bold text-berta-cream mb-6 flex items-center gap-3">
                                <span class="w-8 h-[2px] bg-berta-olive"></span> Batas Administratif
                            </h3>
                            
                            <div class="space-y-5">
                                {{-- Utara --}}
                                <div class="flex items-center gap-4 group">
                                    <div class="w-10 h-10 rounded-full bg-berta-olive/10 flex items-center justify-center text-berta-olive font-bold text-sm border border-berta-olive/20 group-hover:bg-berta-olive group-hover:text-white transition-all duration-300">U</div>
                                    <div>
                                        <p class="text-xs font-bold text-berta-sage uppercase tracking-wider">Sebelah Utara</p>
                                        <p class="text-berta-cream font-medium">Kec. Purwareja Klampok</p>
                                    </div>
                                </div>
                                {{-- Timur --}}
                                <div class="flex items-center gap-4 group">
                                    <div class="w-10 h-10 rounded-full bg-berta-wood/10 flex items-center justify-center text-berta-wood font-bold text-sm border border-berta-wood/20 group-hover:bg-berta-wood group-hover:text-white transition-all duration-300">T</div>
                                    <div>
                                        <p class="text-xs font-bold text-berta-sage uppercase tracking-wider">Sebelah Timur</p>
                                        <p class="text-berta-cream font-medium">Desa Sirkandi</p>
                                    </div>
                                </div>
                                {{-- Selatan/Barat --}}
                                <div class="flex items-center gap-4 group">
                                    <div class="w-10 h-10 rounded-full bg-blue-500/10 flex items-center justify-center text-blue-400 font-bold text-sm border border-blue-500/20 group-hover:bg-blue-500 group-hover:text-white transition-all duration-300">S/B</div>
                                    <div>
                                        <p class="text-xs font-bold text-berta-sage uppercase tracking-wider">Selatan & Barat</p>
                                        <p class="text-berta-cream font-medium">Desa Derik & Karangjati</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        {{-- 2. VISI & MISI SECTION --}}
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            {{-- Visi Card --}}
            <div class="lg:col-span-5 scroll-element opacity-0 translate-y-8">
                <div class="bg-gradient-to-br from-berta-olive to-berta-dark p-1 rounded-3xl h-full shadow-2xl">
                    <div class="bg-berta-dark rounded-[1.3rem] p-10 h-full flex flex-col justify-center items-center text-center relative overflow-hidden">
                        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')] opacity-10"></div>
                        <h2 class="text-3xl font-bold text-berta-cream font-playfair mb-6 relative z-10">Visi Desa</h2>
                        <div class="w-16 h-1 bg-berta-olive rounded-full mb-8 relative z-10"></div>
                        <p class="text-xl text-white font-serif italic leading-relaxed relative z-10">
                            “Terwujudnya tata kelola pemerintahan desa yang efektif dan akuntabel, serta terciptanya masyarakat yang harmonis, dinamis, dan sejahtera.”
                        </p>
                    </div>
                </div>
            </div>

            {{-- Misi List --}}
            <div class="lg:col-span-7 flex flex-col justify-center scroll-element opacity-0 translate-y-8 transition-delay-200">
                <h3 class="text-2xl font-bold text-berta-cream font-playfair mb-8 flex items-center gap-4">
                    <span class="w-8 h-[2px] bg-berta-wood"></span> Misi Pembangunan
                </h3>
                <div class="space-y-4">
                    @php
                        $misi = [
                            "Melakukan perbaikan kinerja aparatur pemerintah desa, guna peningkatan kualitas pelayanan publik yang lebih baik.",
                            "Menyelenggarakan tata pemerintahan yang bersih, jujur, dan berwibawa dengan mengutamakan peran serta masyarakat.",
                            "Meningkatkan derajat ekonomi masyarakat melalui kegiatan ekonomi produktif.",
                            "Meningkatkan derajat kesehatan masyarakat.",
                            "Melestarikan adat dan mengembangkan seni budaya lokal."
                        ];
                    @endphp
                    @foreach($misi as $index => $item)
                    <div class="flex gap-4 p-4 rounded-xl hover:bg-white/5 transition duration-300 border border-transparent hover:border-white/5 group">
                        <span class="flex-shrink-0 w-8 h-8 rounded-full bg-berta-wood/20 text-berta-wood font-bold flex items-center justify-center group-hover:bg-berta-wood group-hover:text-white transition">
                            {{ $index + 1 }}
                        </span>
                        <p class="text-berta-taupe group-hover:text-berta-cream transition">{{ $item }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        {{-- 3. SEJARAH & ASAL USUL --}}
        <section class="relative">
            <div class="absolute inset-0 bg-berta-sage/5 -mx-4 sm:-mx-6 lg:-mx-8 rounded-[3rem] -z-10"></div>
            
            <div class="text-center mb-16 pt-12 scroll-element opacity-0 translate-y-8">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block">Napak Tilas</span>
                <h2 class="text-4xl font-bold text-berta-cream font-playfair">Sejarah & Asal Usul</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6 text-berta-taupe/90 text-lg leading-relaxed text-justify scroll-element opacity-0 translate-y-8">
                    <p>
                        Menurut cerita yang dijelaskan oleh <strong>Den Juneng</strong>, seorang ahli sejarah dan tokoh Padepokan Carang Seket, Desa Berta awalnya dikenal sebagai <strong class="text-berta-cream">Desa Paluh Amba</strong>. Nama ini tercatat dalam Babad Gumelem dan manuskrip-manuskrip lama yang diwariskan secara lisan maupun tulisan.
                    </p>
                    <p>
                        Perubahan nama dari Paluh Amba menjadi Desa Berta diperkirakan terjadi pada masa <strong>Kerajaan Mataram Kuno</strong>. Nama baru ini diduga kuat berkaitan dengan dan diambil dari nama tokoh wanita berpengaruh bernama <strong>Ny Berta</strong>, yang hingga kini dihormati oleh warga setempat.
                    </p>
                </div>
                <div class="relative scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <div class="absolute inset-0 bg-berta-wood/20 rounded-2xl transform rotate-3"></div>
                    <img src="{{ asset('img/oldbalaidesa.jpeg') }}" alt="Sejarah Desa" class="relative rounded-2xl shadow-2xl w-full object-cover grayscale hover:grayscale-0 transition duration-700">
                    <div class="absolute bottom-6 left-6 bg-black/60 backdrop-blur-md px-4 py-2 rounded-lg border-l-4 border-berta-wood">
                        <span class="text-white text-sm font-medium">Ilustrasi Balai Desa Lama</span>
                    </div>
                </div>
            </div>
        </section>

        {{-- 4. TOKOH LEGENDARIS --}}
        <section>
            <h2 class="text-3xl font-bold text-berta-cream font-playfair mb-10 text-center scroll-element opacity-0 translate-y-8">Empat Tokoh Legendaris</h2>
            <p class="text-center text-berta-sage mb-12 max-w-2xl mx-auto scroll-element opacity-0 translate-y-8">Dalam tradisi sejarah lokal, terdapat empat tokoh besar yang dianggap sebagai cikal bakal keberadaan Desa Berta.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- Card 1 --}}
                <div class="bg-white/5 rounded-2xl p-6 border border-white/5 hover:bg-white/10 hover:-translate-y-2 transition duration-300 group scroll-element opacity-0 translate-y-8">
                    <div class="w-14 h-14 bg-berta-olive/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-berta-olive transition">
                        <span class="text-2xl">🗻</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Resi Tunggul Manik</h3>
                    <p class="text-sm text-berta-taupe leading-relaxed">
                        Dipercaya sebagai tokoh berwibawa yang dikaitkan dengan <strong>Maha Patih Gajah Mada</strong>. Makam beliau berada di puncak wilayah Paluh Amba.
                    </p>
                </div>

                {{-- Card 2 --}}
                <div class="bg-white/5 rounded-2xl p-6 border border-white/5 hover:bg-white/10 hover:-translate-y-2 transition duration-300 group scroll-element opacity-0 translate-y-8 transition-delay-200">
                    <div class="w-14 h-14 bg-berta-wood/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-berta-wood transition">
                        <span class="text-2xl">👑</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Eyang Wijaya Murti</h3>
                    <p class="text-sm text-berta-taupe leading-relaxed">
                        Seorang lurah di akhir era <strong>Majapahit</strong> hingga Mataram. Beliau dimakamkan di area situs Jambe Sewu.
                    </p>
                </div>

                {{-- Card 3 --}}
                <div class="bg-white/5 rounded-2xl p-6 border border-white/5 hover:bg-white/10 hover:-translate-y-2 transition duration-300 group scroll-element opacity-0 translate-y-8 transition-delay-300">
                    <div class="w-14 h-14 bg-blue-500/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-blue-500 transition">
                        <span class="text-2xl">⚓</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Ki Baron Sekeber</h3>
                    <p class="text-sm text-berta-taupe leading-relaxed">
                        Saudagar kaya asal <strong>Spanyol</strong> (Ki Selo Kerti). Legenda menyebutkan konfrontasinya dengan Panembahan Senopati.
                    </p>
                </div>

                {{-- Card 4 --}}
                <div class="bg-white/5 rounded-2xl p-6 border border-white/5 hover:bg-white/10 hover:-translate-y-2 transition duration-300 group scroll-element opacity-0 translate-y-8 transition-delay-400">
                    <div class="w-14 h-14 bg-pink-500/20 rounded-full flex items-center justify-center mb-6 group-hover:bg-pink-500 transition">
                        <span class="text-2xl">🌺</span>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Ny Berta</h3>
                    <p class="text-sm text-berta-taupe leading-relaxed">
                        Tokoh wanita yang namanya diabadikan menjadi <strong>nama desa</strong>. Makam beliau berada di dekat Makam Bolang di situs Jambe Sewu.
                    </p>
                </div>
            </div>
        </section>

        {{-- 5. ADMINISTRASI & WARISAN --}}
        <section class="bg-berta-dark border border-berta-sage/20 rounded-3xl p-8 md:p-12 scroll-element opacity-0 translate-y-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 divide-y md:divide-y-0 md:divide-x divide-white/10">
                <div class="pr-0 md:pr-12">
                    <h3 class="text-2xl font-bold text-berta-cream font-playfair mb-4">Perubahan Administrasi</h3>
                    <p class="text-berta-taupe leading-relaxed text-justify">
                        Dalam sejarahnya, di masa pemerintahan Kadipaten Merden, terdapat wilayah bernama <strong>Kali Bangkang</strong> yang dihapus dari arsip administratif karena dianggap sering membangkang. Sebagian wilayahnya kemudian disatukan dengan Desa Berta dan Desa Karangjati. Setelah Kadipaten Merden dipindahkan ke Cilacap, wilayah Berta menjadi bagian dari tanah perdikan <strong>Kademangan Gumelem</strong>.
                    </p>
                </div>
                <div class="pt-8 md:pt-0 pl-0 md:pl-12">
                    <h3 class="text-2xl font-bold text-berta-cream font-playfair mb-4">Warisan Budaya</h3>
                    <p class="text-berta-taupe leading-relaxed text-justify">
                        Hingga kini, situs-situs bersejarah seperti makam Resi Tunggul Manik, Eyang Wijaya Murti, Ki Baron Sekeber, dan Ny Berta di <strong>Jambe Sewu</strong> menjadi tempat kunjungan dan ziarah bagi masyarakat lokal dan peziarah luar. Keberadaan situs-situs ini menjadi bukti kuat kedalaman sejarah dan akar budaya Desa Berta yang tetap hidup dalam tradisi masyarakatnya.
                    </p>
                </div>
            </div>
        </section>

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
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }

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