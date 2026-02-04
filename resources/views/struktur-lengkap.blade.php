<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur Lengkap - Desa Berta</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION DENGAN BACKGROUND PERANGKAT.PNG --}}
    <div class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image & Overlay --}}
        <div class="absolute inset-0 z-0">
            {{-- Foto Perangkat dijadikan background fixed (parallax effect) --}}
            <img src="{{ asset('img/perangkat.png') }}" 
                 class="w-full h-full object-cover fixed top-0 left-0 -z-10 brightness-50" 
                 alt="Perangkat Desa Berta">
            
            {{-- Gradasi agar teks terbaca & menyatu dengan body --}}
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/80 via-berta-dark/40 to-berta-dark"></div>
            
            {{-- Noise texture halus --}}
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Text Hero --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-20">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold tracking-[0.2em] uppercase mb-6 border border-white/20 opacity-0 animate-fade-in-down">
                Transparansi Publik
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-2xl opacity-0 animate-fade-in-up delay-100">
                Struktur Organisasi <br> <span class="text-berta-olive">Pemerintah Desa</span>
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-lg font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Mengenal lebih dekat para aparatur yang siap melayani kebutuhan warga Desa Berta dengan profesional dan sepenuh hati.
            </p>
        </div>
    </div>

    {{-- BAGAN STRUKTUR (GAMBAR) --}}
    <div class="relative z-10 -mt-20 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
            {{-- [ANIMASI] Scroll Element pada Container Gambar --}}
            <div class="relative group rounded-3xl p-1.5 bg-gradient-to-br from-berta-olive/30 to-berta-wood/30 shadow-2xl backdrop-blur-sm scroll-element opacity-0 translate-y-8">
                <div class="absolute inset-0 bg-berta-olive/5 blur-xl group-hover:bg-berta-olive/10 transition duration-700"></div>
                
                <div class="relative bg-berta-dark/90 rounded-[1.3rem] overflow-hidden border border-white/5">
                    <div class="absolute top-4 right-4 bg-black/60 backdrop-blur-md px-3 py-1.5 rounded-lg text-xs font-medium text-white opacity-0 group-hover:opacity-100 transition duration-300 z-20 pointer-events-none border border-white/10">
                        Klik kanan > Open Image untuk Zoom
                    </div>
                    {{-- Gambar Bagan --}}
                    <img src="{{ asset('img/struktur_perangkat.jpg') }}" alt="Bagan Struktur Lengkap" class="w-full h-auto opacity-95 group-hover:opacity-100 transition duration-500">
                </div>
            </div>
        </div>

        {{-- DAFTAR APARATUR (GRID) --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-16 scroll-element opacity-0 translate-y-8">
                <div class="h-[1px] flex-grow bg-gradient-to-r from-transparent to-berta-sage/30"></div>
                <h2 class="text-2xl md:text-3xl font-bold text-berta-cream uppercase tracking-wider text-center">Daftar Aparatur Desa</h2>
                <div class="h-[1px] flex-grow bg-gradient-to-l from-transparent to-berta-sage/30"></div>
            </div>

            @php               
                $all_staff = [
                    ['nama' => 'Slamet Riyadi, S.Pd.SD.', 'jabatan' => 'Kepala Desa', 'foto' => 'img/kades.jpg'],
                    ['nama' => 'Udin Hidayat', 'jabatan' => 'Sekretaris Desa', 'foto' => 'img/sekdes.jpg'],
                    ['nama' => 'Pupi Rahayu, S.H.', 'jabatan' => 'Kaur Keuangan', 'foto' => 'img/kaur_keuangan.jpg'],
                    ['nama' => 'Ary Setyo Nugroho', 'jabatan' => 'Kaur Perencanaan', 'foto' => 'img/kaur_perencanaan.jpg'],
                    ['nama' => 'Rochmat', 'jabatan' => 'Kaur TU & Umum', 'foto' => 'img/kaur_tatausaha.jpg'],
                    ['nama' => 'Satimin', 'jabatan' => 'Staff Kaur TU & Umum', 'foto' => 'img/staff_tatausaha.jpg'],
                    ['nama' => 'Joko Ratono', 'jabatan' => 'Kasie Pelayanan', 'foto' => 'img/kasie_pelayanan.jpg'],
                    ['nama' => 'Parwati', 'jabatan' => 'Kasie Pemerintahan', 'foto' => 'img/kasie_pemerintahan.jpg'],
                    ['nama' => 'Taslim', 'jabatan' => 'Kasie Kesejahteraan', 'foto' => 'img/kasie_kesejahteraan.jpg'],
                    ['nama' => 'Darso', 'jabatan' => 'Staff Kasie Pelayanan', 'foto' => 'img/staff_pelayanan.jpg'],
                    ['nama' => 'Sukanto', 'jabatan' => 'Kadus Krajan', 'foto' => 'img/kadus_krajan.jpg'],
                    ['nama' => 'Carisan', 'jabatan' => 'Kadus Pete', 'foto' => 'img/kadus_pete.jpg'],
                    ['nama' => 'Saidi', 'jabatan' => 'Kadus Kalibangkang', 'foto' => 'img/kadus_kalibangkang.jpg'],
                    ['nama' => 'Margianto', 'jabatan' => 'Kadus Danayuda', 'foto' => 'img/kadus_danayuda.jpg'],
                    ['nama' => 'Solekhan', 'jabatan' => 'Kadus Mertelu', 'foto' => 'img/kadus_mertelu.jpg'],
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-8">
                @foreach($all_staff as $staff)
                {{-- [ANIMASI] Menambahkan scroll-element dan delay bertingkat --}}
                <div class="group relative scroll-element opacity-0 translate-y-8" 
                     style="transition-delay: {{ ($loop->index % 5) * 100 }}ms">
                    
                    {{-- Glow Effect --}}
                    <div class="absolute -inset-0.5 bg-gradient-to-b from-berta-olive to-berta-wood rounded-[1.5rem] blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
                    
                    <div class="relative bg-berta-dark border border-berta-sage/10 rounded-[1.4rem] overflow-hidden shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full group-hover:shadow-2xl group-hover:shadow-berta-olive/10">
                        
                        {{-- Foto Staff --}}
                        <div class="aspect-[3/4] overflow-hidden relative bg-berta-wood/5">
                            <img src="{{ asset($staff['foto']) }}" alt="{{ $staff['nama'] }}" 
                                 class="w-full h-full object-cover transform transition duration-700 ease-in-out group-hover:scale-105 group-hover:brightness-110"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($staff['nama']) }}&background=676F53&color=fff&size=512&font-size=0.35'">
                            
                            {{-- Gradient Overlay Bawah --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/20 to-transparent opacity-80"></div>
                        </div>

                        {{-- Info Staff --}}
                        <div class="absolute bottom-0 w-full p-5 text-center">
                            <h3 class="text-lg font-bold text-white leading-tight mb-2 drop-shadow-md group-hover:text-berta-cream transition">{{ $staff['nama'] }}</h3>
                            
                            <div class="w-8 h-0.5 bg-berta-olive mx-auto mb-3 rounded-full group-hover:w-16 transition-all duration-300"></div>
                            
                            <div class="inline-block px-3 py-1 rounded-full bg-white/5 backdrop-blur-sm border border-white/10 group-hover:bg-berta-olive/20 group-hover:border-berta-olive/30 transition duration-300">
                                <p class="text-[0.65rem] text-berta-sage uppercase font-bold tracking-widest group-hover:text-white transition">{{ $staff['jabatan'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('components.footer')

    {{-- Script Animasi Scroll --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        observer.unobserve(entry.target);
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

        /* Class untuk elemen yang di-scroll */
        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 800ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>

</body>
</html>