<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur Lengkap - Desa Berta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white">

    @include('components.navbar')

    <div class="pt-32 pb-16 relative overflow-hidden">
        <div class="absolute top-0 left-1/2 transform -translate-x-1/2 w-full h-full bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 pointer-events-none"></div>
        <div class="absolute top-[-20%] left-[-10%] w-96 h-96 bg-berta-olive/10 rounded-full blur-[100px] pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
            <span class="inline-block px-4 py-1 rounded-full bg-berta-sage/10 text-berta-sage text-xs font-bold tracking-widest uppercase mb-4 border border-berta-sage/20">Transparansi Publik</span>
            <h1 class="text-4xl md:text-6xl font-bold text-berta-cream mb-6 leading-tight">Struktur Organisasi <br> <span class="text-berta-olive">Pemerintah Desa</span></h1>
            <p class="text-berta-sage max-w-2xl mx-auto text-lg font-light">Mengenal lebih dekat para aparatur yang siap melayani kebutuhan warga Desa Berta dengan sepenuh hati.</p>
        </div>
    </div>

    <div class="pb-24 relative z-10">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mb-24">
            <div class="relative group rounded-3xl p-2 bg-gradient-to-b from-berta-sage/20 to-transparent">
                <div class="absolute inset-0 bg-berta-olive/5 blur-xl group-hover:bg-berta-olive/10 transition duration-700"></div>
                <div class="relative bg-berta-dark rounded-[1.3rem] overflow-hidden border border-berta-sage/10 shadow-2xl">
                    <div class="absolute top-4 right-4 bg-black/50 backdrop-blur-md px-3 py-1 rounded-lg text-xs text-white opacity-0 group-hover:opacity-100 transition duration-300 z-20 pointer-events-none">
                        Klik kanan > Open Image untuk Zoom
                    </div>
                    <img src="{{ asset('img/struktur_perangkat.jpg') }}" alt="Bagan Struktur Lengkap" class="w-full h-auto opacity-90 group-hover:opacity-100 transition duration-500">
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center gap-4 mb-12">
                <div class="h-[1px] flex-grow bg-berta-sage/20"></div>
                <h2 class="text-2xl font-bold text-berta-cream uppercase tracking-wider">Daftar Aparatur Desa</h2>
                <div class="h-[1px] flex-grow bg-berta-sage/20"></div>
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
                <div class="group relative">
                    <div class="absolute -inset-0.5 bg-gradient-to-b from-berta-olive to-berta-wood rounded-[1.5rem] blur opacity-0 group-hover:opacity-60 transition duration-500"></div>
                    
                    <div class="relative bg-berta-dark border border-berta-sage/10 rounded-[1.4rem] overflow-hidden shadow-xl hover:-translate-y-2 transition-all duration-300 flex flex-col h-full">
                        
                        <div class="aspect-[3/4] overflow-hidden relative bg-berta-wood/10">
                            <img src="{{ asset($staff['foto']) }}" alt="{{ $staff['nama'] }}" 
                                 class="w-full h-full object-cover transform transition duration-700 ease-in-out group-hover:scale-110 group-hover:brightness-110"
                                 onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($staff['nama']) }}&background=676F53&color=fff&size=512&font-size=0.35'">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-transparent to-transparent opacity-90"></div>
                            
                            <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/0 to-white/10 opacity-0 group-hover:opacity-100 transition duration-500 pointer-events-none"></div>
                        </div>

                        <div class="absolute bottom-0 w-full p-5 text-center">
                            <h3 class="text-lg font-bold text-berta-cream leading-tight mb-2 drop-shadow-md">{{ $staff['nama'] }}</h3>
                            
                            <div class="w-10 h-0.5 bg-berta-olive mx-auto mb-2 rounded-full"></div>
                            
                            <div class="inline-block px-3 py-1 rounded-full bg-berta-cream/10 backdrop-blur-sm border border-berta-cream/10">
                                <p class="text-[0.6rem] text-berta-sage uppercase font-bold tracking-widest">{{ $staff['jabatan'] }}</p>
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('components.footer')

</body>
</html>