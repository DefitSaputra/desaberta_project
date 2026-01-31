<section class="relative py-28 bg-berta-dark overflow-hidden">
    
    <style>
        .animate-float-slow { animation: float 10s ease-in-out infinite; }
        .animate-pulse-slow { animation: pulse 6s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes float {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(2deg); }
        }
    </style>

    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay pointer-events-none"></div>
    <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-berta-olive/5 rounded-full blur-[120px] pointer-events-none animate-pulse-slow"></div>
    <div class="absolute bottom-0 left-0 w-[600px] h-[600px] bg-berta-wood/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 border-b border-berta-sage/10 pb-8">
            <div class="max-w-2xl">
                <h2 class="text-4xl md:text-5xl font-bold text-berta-cream mb-4 tracking-tight">
                    Jelajahi <span class="text-berta-olive">Desa Digital</span>
                </h2>
                <p class="text-berta-sage/80 text-lg font-light leading-relaxed">
                    Akses transparansi data, profil wilayah, hingga dokumentasi kegiatan desa dalam satu ekosistem digital yang terintegrasi.
                </p>
            </div>
            <div class="hidden md:flex items-center gap-2 px-4 py-2 rounded-full border border-berta-sage/20 bg-white/5 backdrop-blur-md">
                <span class="relative flex h-2 w-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                </span>
                <span class="text-xs font-mono text-berta-cream uppercase tracking-widest">Portal Informasi</span>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:h-[500px]">
            
            <a href="#galeri" class="lg:col-span-2 lg:row-span-2 group relative rounded-[2.5rem] overflow-hidden shadow-2xl hover:shadow-berta-olive/20 transition-all duration-500 cursor-pointer">
                <img src="{{ asset('img/foto1.jpg') }}" alt="Galeri Desa" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110 group-hover:rotate-1">
                <div class="absolute inset-0 bg-gradient-to-br from-berta-dark/90 via-berta-dark/60 to-transparent mix-blend-multiply"></div>
                
                <div class="relative h-full p-10 flex flex-col justify-between z-10">
                    <div class="flex justify-between items-start">
                        <div class="p-4 bg-white/10 backdrop-blur-md rounded-2xl border border-white/10 text-berta-cream group-hover:bg-berta-cream group-hover:text-berta-dark transition duration-300">
                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                        </div>
                        <span class="px-3 py-1 rounded-full bg-black/40 backdrop-blur-sm text-xs font-bold text-white border border-white/10 uppercase tracking-wide">Dokumentasi</span>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <h3 class="text-3xl md:text-4xl font-bold text-white mb-3 drop-shadow-md">Galeri Desa</h3>
                            <p class="text-white/90 text-lg leading-relaxed max-w-sm drop-shadow-sm">
                                Lihat potret kegiatan, pembangunan, dan keindahan alam Desa Berta melalui lensa visual.
                            </p>
                        </div>
                        
                        <div class="inline-flex items-center gap-2 text-berta-cream font-bold group-hover:gap-4 transition-all">
                            <span>Lihat Foto Kegiatan</span>
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>

            <a href="#profil" class="lg:col-span-1 group relative rounded-[2rem] overflow-hidden shadow-lg transition-all duration-300">
                <img src="{{ asset('img/oldbalaidesa.jpeg') }}" alt="Profil Desa" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-berta-dark/90 via-berta-dark/50 to-transparent"></div>
                
                <div class="p-8 flex flex-col h-full justify-end relative z-10">
                    <div class="mb-auto">
                        <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-1">Profil Desa</h4>
                        <p class="text-sm text-white/70">Sejarah & Visi Misi</p>
                    </div>
                    <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transform translate-x-[-10px] group-hover:translate-x-0 transition duration-300 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>

            <a href="#statistik" class="lg:col-span-1 group relative rounded-[2rem] overflow-hidden shadow-lg transition-all duration-300">
                <img src="{{ asset('img/datadesa.jpg') }}" alt="Data Desa" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-berta-dark/90 via-berta-dark/50 to-transparent"></div>

                <div class="p-8 flex flex-col h-full justify-end relative z-10">
                    <div class="mb-auto">
                        <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-white mb-4">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                        </div>
                    </div>
                    <div>
                        <h4 class="text-xl font-bold text-white mb-1">Data Desa</h4>
                        <p class="text-sm text-white/70">Demografi & Penduduk</p>
                    </div>
                    <div class="absolute top-6 right-6 opacity-0 group-hover:opacity-100 transform translate-x-[-10px] group-hover:translate-x-0 transition duration-300 text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </div>
                </div>
            </a>

            <a href="#struktur" class="lg:col-span-2 group relative rounded-[2rem] overflow-hidden shadow-lg transition-all duration-300">
                <img src="{{ asset('img/balaidesa.jpg') }}" alt="Pemerintahan Desa" class="absolute inset-0 w-full h-full object-cover transition duration-700 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-r from-berta-dark/90 via-berta-dark/60 to-transparent"></div>

                <div class="p-8 w-full flex items-center justify-between relative z-10 h-full">
                    <div class="flex items-center gap-6">
                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center text-white group-hover:scale-110 transition duration-300">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-2xl font-bold text-white mb-1">Pemerintahan</h4>
                            <p class="text-white/80">Struktur Organisasi & Aparatur Desa</p>
                        </div>
                    </div>
                    
                    <div class="w-12 h-12 rounded-full border border-white/30 flex items-center justify-center text-white group-hover:bg-white group-hover:text-berta-dark transition duration-300">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </div>
                </div>
            </a>

        </div>
    </div>
</section>