<section id="galeri" class="py-24 bg-berta-coffee/5 relative overflow-hidden">
    
    {{-- Background Decor --}}
    <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-berta-dark to-transparent opacity-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="text-center mb-16">
            <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block">Dokumentasi</span>
            <h2 class="text-3xl md:text-5xl font-bold text-berta-cream mb-4 font-playfair">Galeri Kegiatan</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-berta-olive to-berta-wood mx-auto rounded-full"></div>
            <p class="text-berta-sage mt-4 max-w-2xl mx-auto">Merekam jejak langkah pembangunan dan kebersamaan warga Desa Berta dalam bingkai visual.</p>
        </div>

        {{-- Grid Galeri --}}
        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            
            @forelse($galeri as $item)
            {{-- Mengubah Div menjadi Anchor (Link) agar bisa diklik --}}
            <a href="{{ route('galeri.index') }}" class="block break-inside-avoid group relative rounded-2xl overflow-hidden shadow-lg hover:shadow-berta-olive/20 transition-all duration-500 cursor-pointer">
                
                {{-- Gambar (Tanpa Filter Grayscale) --}}
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                     class="w-full h-auto object-cover transform transition duration-700 ease-in-out group-hover:scale-110">
                
                {{-- Overlay Text --}}
                <div class="absolute inset-0 bg-gradient-to-t from-berta-dark/90 via-berta-dark/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-6">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <span class="text-xs font-bold text-berta-olive uppercase tracking-wider mb-1 block">{{ $item->category }}</span>
                        <h4 class="text-xl font-bold text-white">{{ $item->title }}</h4>
                        
                        {{-- Indikator Klik --}}
                        <div class="mt-3 flex items-center gap-2 text-xs text-white/70">
                            <span>Lihat Detail</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </div>
                    </div>
                </div>
            </a>
            @empty
                {{-- State Kosong --}}
                <div class="col-span-full text-center py-12 text-berta-sage/50 border border-dashed border-berta-sage/20 rounded-2xl w-full">
                    <p class="text-lg">Belum ada dokumentasi kegiatan yang diunggah.</p>
                </div>
            @endforelse

        </div>

        {{-- Tombol Lihat Selengkapnya --}}
        <div class="text-center mt-12">
            <a href="{{ route('galeri.index') }}" class="inline-block px-8 py-3 rounded-full border border-berta-sage/30 text-berta-sage hover:bg-berta-sage hover:text-berta-dark transition duration-300 text-sm font-bold tracking-wide uppercase">
                Lihat Galeri Selengkapnya
            </a>
        </div>
    </div>

</section>