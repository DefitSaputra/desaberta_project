@php
    // Konfigurasi Data Potensi (Bento Grid Layout)
    $items = [
        [
            'title' => 'Kerajinan Anyaman Piti',
            'category' => 'Ekonomi Kreatif',
            'desc' => 'Warisan leluhur anyaman bambu yang disulap menjadi tas dan wadah estetis bernilai ekonomi tinggi.',
            'image' => 'img/tas_anyaman.jpeg', 
            'grid' => 'md:col-span-2 md:row-span-2',
            'icon' => '👜'
        ],
        [
            'title' => 'Gula Kelapa Murni',
            'category' => 'Agroindustri',
            'desc' => 'Produksi gula jawa tradisional dengan nira kelapa pilihan tanpa bahan pengawet.',
            'image' => 'img/gulajawa.jpeg',
            'grid' => 'md:col-span-1 md:row-span-1',
            'icon' => '🥥'
        ],
        [
            'title' => 'Gula Semut Organik',
            'category' => 'Komoditas Ekspor',
            'desc' => 'Inovasi gula kelapa serbuk (kristal) yang praktis dan diminati pasar modern.',
            'image' => 'img/gulasemut.jpeg',
            'grid' => 'md:col-span-1 md:row-span-1',
            'icon' => '✨'
        ],
        [
            'title' => 'Sentra Anyaman Bambu',
            'category' => 'Home Industry',
            'desc' => 'Pusat produksi besek dan perabotan bambu yang melibatkan pemberdayaan ibu-ibu rumah tangga.',
            'image' => 'img/anyaman.jpeg', // atau kerajinan_anyaman.jpeg
            'grid' => 'md:col-span-1 md:row-span-1',
            'icon' => '🎋'
        ],
        [
            'title' => 'UMKM Camilan Khas',
            'category' => 'Kuliner Desa',
            'desc' => 'Aneka keripik dan makanan ringan olahan hasil bumi warga setempat.',
            'image' => 'img/keripik.jpeg',
            'grid' => 'md:col-span-2 md:row-span-1', // Kartu Lebar
            'icon' => 'chips' // Icon custom svg di bawah
        ],
    ];
@endphp

<section id="potensi" class="relative py-24 bg-berta-dark overflow-hidden animate-on-scroll" data-anim-delay="0">
    
    <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 mix-blend-overlay pointer-events-none"></div>
    <div class="absolute top-1/2 left-0 w-[500px] h-[500px] bg-berta-wood/10 rounded-full blur-[120px] pointer-events-none -translate-y-1/2"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6 animate-on-scroll" data-anim-delay="40">
            <div class="max-w-2xl">
                <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block animate-pulse">Kearifan Lokal</span>
                <h2 class="text-4xl md:text-5xl font-bold text-berta-cream mb-4 font-playfair">
                    Potensi Unggulan <span class="italic text-berta-wood">Desa</span>
                </h2>
                <div class="h-1 w-20 bg-gradient-to-r from-berta-olive to-berta-wood rounded-full"></div>
            </div>
            
            <a href="{{ url('/potensi-desa') }}" class="hidden md:inline-flex items-center gap-2 text-berta-sage hover:text-berta-cream transition group">
                <span class="text-sm font-medium">Lihat Semua Potensi</span>
                <div class="w-8 h-8 rounded-full border border-berta-sage/30 flex items-center justify-center group-hover:bg-berta-olive group-hover:border-berta-olive group-hover:text-white transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 auto-rows-[300px]">
            
            @foreach($items as $item)
            <div class="group relative rounded-[2rem] overflow-hidden bg-berta-wood/5 border border-berta-sage/10 {{ $item['grid'] }} transition-all duration-500 hover:shadow-2xl hover:shadow-berta-olive/10 animate-on-scroll" data-anim-delay="{{ $loop->index * 80 }}">
                
                <img src="{{ asset($item['image']) }}" alt="{{ $item['title'] }}" 
                     class="absolute inset-0 w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/40 to-transparent opacity-80 group-hover:opacity-60 transition duration-500"></div>
                
                <div class="absolute inset-0 p-8 flex flex-col justify-end">
                    
                    <div class="absolute top-6 right-6 w-12 h-12 bg-white/10 backdrop-blur-md border border-white/20 rounded-full flex items-center justify-center text-2xl shadow-lg transform translate-y-[-10px] opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition duration-500 delay-100">
                        @if($item['icon'] == 'chips')
                            🍪
                        @else
                            {{ $item['icon'] }}
                        @endif
                    </div>

                    <div class="transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <span class="inline-block px-3 py-1 mb-3 text-[0.65rem] font-bold tracking-widest uppercase text-white bg-berta-olive/80 backdrop-blur-sm rounded-full">
                            {{ $item['category'] }}
                        </span>
                        <h3 class="text-2xl font-bold text-white mb-2 font-playfair leading-tight drop-shadow-md">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-berta-cream/80 text-sm line-clamp-2 opacity-0 group-hover:opacity-100 transition duration-500 delay-100">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

            <a href="{{ url('/potensi-desa') }}" class="group relative rounded-[2rem] overflow-hidden bg-gradient-to-br from-berta-olive to-berta-wood md:col-span-1 md:row-span-1 flex items-center justify-center text-center p-6 border border-white/10 hover:scale-[1.02] transition duration-300 cursor-pointer animate-on-scroll" data-anim-delay="480">
                <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/wood-pattern.png')] opacity-10 mix-blend-overlay"></div>
                
                <div class="relative z-10">
                    <div class="w-16 h-16 mx-auto bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center mb-4 text-white group-hover:rotate-45 transition duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-1">Eksplorasi Lainnya</h3>
                    <p class="text-white/80 text-xs">Temukan lebih banyak potensi Desa Berta</p>
                </div>
            </a>

        </div>

    </div>
</section>