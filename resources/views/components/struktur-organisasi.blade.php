@php
    $pejabat_inti = [
        ['nama' => 'Slamet Riyadi, S.Pd.SD.', 'jabatan' => 'Kepala Desa', 'foto' => 'img/kades.jpg'],
        ['nama' => 'Udin Hidayat', 'jabatan' => 'Sekretaris Desa', 'foto' => 'img/sekdes.jpg'],
        ['nama' => 'Pupi Rahayu, S.H.', 'jabatan' => 'Kaur Keuangan', 'foto' => 'img/kaur_keuangan.jpg'],
        ['nama' => 'Rochmat', 'jabatan' => 'Kaur Tata Usaha & Umum', 'foto' => 'img/kaur_tatausaha.jpg'],
    ];
@endphp

<section id="struktur" class="relative py-24 bg-berta-dark overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 mix-blend-overlay pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-5xl h-64 bg-berta-olive/10 blur-[100px] rounded-full pointer-events-none"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="text-center mb-16">
            <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block animate-pulse">Pemerintahan Desa</span>
            <h2 class="text-3xl md:text-5xl font-bold text-berta-cream mb-6">Struktur Organisasi</h2>
            <div class="w-24 h-1 bg-gradient-to-r from-transparent via-berta-olive to-transparent mx-auto rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            @foreach($pejabat_inti as $p)
            <div class="group relative">
                <div class="absolute -inset-0.5 bg-gradient-to-br from-berta-olive to-berta-wood rounded-[2rem] blur opacity-0 group-hover:opacity-50 transition duration-500"></div>
                
                <div class="relative h-full bg-berta-dark rounded-[1.8rem] border border-berta-sage/10 overflow-hidden shadow-2xl hover:-translate-y-2 transition-all duration-300 flex flex-col">
                    
                    <div class="aspect-[4/5] overflow-hidden bg-berta-wood/10 relative">
                        <img src="{{ asset($p['foto']) }}" alt="{{ $p['nama'] }}" 
                             class="w-full h-full object-cover transform transition duration-700 ease-in-out group-hover:scale-105 group-hover:brightness-110"
                             onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($p['nama']) }}&background=676F53&color=fff&size=512'">
                        
                        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-berta-dark via-berta-dark/50 to-transparent opacity-90"></div>
                        
                        <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/0 to-white/10 opacity-0 group-hover:opacity-100 transition duration-700 pointer-events-none"></div>
                    </div>

                    <div class="p-6 text-center bg-berta-dark absolute bottom-0 w-full backdrop-blur-sm border-t border-white/5">
                        <h3 class="text-lg font-bold text-berta-cream leading-tight mb-1">{{ $p['nama'] }}</h3>
                        <p class="text-xs text-berta-sage font-bold uppercase tracking-widest">{{ $p['jabatan'] }}</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="text-center mt-16">
            <a href="{{ route('struktur.lengkap') }}" class="group relative inline-flex items-center gap-3 px-8 py-4 bg-berta-olive hover:bg-berta-wood text-white rounded-full font-bold transition-all duration-300 shadow-lg hover:shadow-berta-olive/30 overflow-hidden">
                <span class="relative z-10">Lihat Struktur Lebih Lengkap</span>
                <svg class="w-5 h-5 relative z-10 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent group-hover:left-full transition-all duration-700 ease-in-out"></div>
            </a>
            <p class="text-berta-sage/60 text-sm mt-4">Klik tombol di atas untuk melihat bagan lengkap dan seluruh perangkat desa.</p>
        </div>

    </div>
</section>