<section id="berita" class="py-24 bg-berta-dark relative overflow-hidden border-t border-white/5">
    
    {{-- Background Decor --}}
    <div class="absolute right-0 top-0 w-1/2 h-full bg-berta-olive/5 blur-3xl rounded-full pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-2xl">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block">Kabar Desa</span>
                <h2 class="text-3xl md:text-5xl font-bold text-berta-cream font-playfair leading-tight">Berita & Informasi Terbaru</h2>
                <div class="w-20 h-1.5 bg-gradient-to-r from-berta-olive to-berta-wood mt-4 rounded-full"></div>
            </div>
            
            <a href="{{ route('berita.index') }}" class="group flex items-center gap-2 text-berta-sage hover:text-berta-cream transition duration-300 pb-2 border-b border-transparent hover:border-berta-olive">
                <span class="text-sm font-bold uppercase tracking-wide">Lihat Semua Berita</span>
                <svg class="w-4 h-4 transform group-hover:translate-x-1 transition duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>

        {{-- Grid Berita --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @forelse($berita as $item)
            <article class="group flex flex-col h-full bg-white/5 border border-white/5 rounded-2xl overflow-hidden hover:border-berta-olive/30 hover:bg-white/10 transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl hover:shadow-berta-olive/10">
                
                {{-- Thumbnail --}}
                <div class="relative h-56 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700 ease-out">
                    
                    {{-- Badge Tanggal --}}
                    <div class="absolute top-4 left-4 bg-berta-dark/80 backdrop-blur-sm px-3 py-1 rounded-lg border border-white/10">
                        <span class="text-xs font-bold text-berta-olive uppercase tracking-wider">
                            {{ \Carbon\Carbon::parse($item->published_at)->translatedFormat('d M Y') }}
                        </span>
                    </div>
                </div>

                {{-- Content --}}
                <div class="flex flex-col flex-grow p-6">
                    <h3 class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-berta-cream transition">
                        <a href="{{ route('berita.show', $item->slug) }}">
                            {{ Str::limit($item->title, 60) }}
                        </a>
                    </h3>
                    
                    <div class="text-berta-sage/70 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                        {!! Str::limit(strip_tags($item->content), 120) !!}
                    </div>

                    <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center gap-2 text-sm font-bold text-berta-olive hover:text-berta-wood transition uppercase tracking-wide mt-auto">
                        Baca Selengkapnya
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </article>
            @empty
            <div class="col-span-3 text-center py-12 border border-dashed border-white/10 rounded-2xl">
                <p class="text-berta-sage">Belum ada berita terbaru.</p>
            </div>
            @endforelse
        </div>

    </div>
</section>