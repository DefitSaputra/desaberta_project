@php
    // Data Dummy Galeri dengan Kategori
    $galeri = [
        ['src' => 'img/bg3.png', 'title' => 'Pemandangan Alam', 'cat' => 'Wisata Alam', 'height' => 'h-64'],
        ['src' => 'img/foto.jpg', 'title' => 'Musyawarah Desa', 'cat' => 'Kegiatan', 'height' => 'h-80'],
        ['src' => 'img/foto1.jpg', 'title' => 'Gotong Royong', 'cat' => 'Sosial', 'height' => 'h-72'],
        ['src' => 'img/foto2.jpg', 'title' => 'Panen Raya', 'cat' => 'Pertanian', 'height' => 'h-64'],
        ['src' => 'img/wisata.png', 'title' => 'Destinasi Wisata', 'cat' => 'Pariwisata', 'height' => 'h-96'],
        ['src' => 'img/budaya.png', 'title' => 'Festival Budaya', 'cat' => 'Seni & Budaya', 'height' => 'h-72'],
    ];
@endphp

<section id="galeri" class="py-24 bg-berta-coffee/5 relative overflow-hidden" 
         x-data="{ 
            open: false, 
            imgSrc: '', 
            imgTitle: '', 
            imgCat: '',
            showModal(src, title, cat) {
                this.open = true;
                this.imgSrc = src;
                this.imgTitle = title;
                this.imgCat = cat;
            }
         }">
    
    <div class="absolute top-0 left-0 w-full h-24 bg-gradient-to-b from-berta-dark to-transparent opacity-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="text-center mb-16">
            <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block">Dokumentasi</span>
            <h2 class="text-3xl md:text-5xl font-bold text-berta-cream mb-4 font-playfair">Galeri Kegiatan</h2>
            <div class="w-20 h-1.5 bg-gradient-to-r from-berta-olive to-berta-wood mx-auto rounded-full"></div>
            <p class="text-berta-sage mt-4 max-w-2xl mx-auto">Merekam jejak langkah pembangunan dan kebersamaan warga Desa Berta dalam bingkai visual.</p>
        </div>

        <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
            
            @foreach($galeri as $item)
            <div class="break-inside-avoid group relative rounded-2xl overflow-hidden cursor-zoom-in shadow-lg hover:shadow-berta-olive/20 transition-all duration-500"
                 @click="showModal('{{ asset($item['src']) }}', '{{ $item['title'] }}', '{{ $item['cat'] }}')">
                
                <img src="{{ asset($item['src']) }}" alt="{{ $item['title'] }}" 
                     class="w-full h-auto object-cover transform transition duration-700 ease-in-out group-hover:scale-110">
                
                <div class="absolute inset-0 bg-gradient-to-t from-berta-dark/90 via-berta-dark/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-6">
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition duration-500">
                        <span class="text-xs font-bold text-berta-olive uppercase tracking-wider mb-1 block">{{ $item['cat'] }}</span>
                        <h4 class="text-xl font-bold text-white">{{ $item['title'] }}</h4>
                    </div>
                </div>

                <div class="absolute inset-0 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-500 delay-100 pointer-events-none">
                    <div class="w-12 h-12 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center text-white">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"></path></svg>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <div class="text-center mt-12">
            <button class="px-8 py-3 rounded-full border border-berta-sage/30 text-berta-sage hover:bg-berta-sage hover:text-berta-dark transition duration-300 text-sm font-bold tracking-wide uppercase">
                Lihat Selengkapnya di Instagram
            </button>
        </div>
    </div>

    <div x-show="open" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 backdrop-blur-sm p-4"
         style="display: none;">
        
        <button @click="open = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition transform hover:rotate-90 duration-300">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>

        <div class="relative max-w-5xl w-full max-h-screen" @click.away="open = false">
            <img :src="imgSrc" class="w-full h-auto max-h-[85vh] object-contain rounded-lg shadow-2xl mx-auto border border-white/10" alt="Detail Galeri">
            
            <div class="mt-4 text-center">
                <span class="text-berta-olive text-xs font-bold uppercase tracking-widest block mb-1" x-text="imgCat"></span>
                <h3 class="text-2xl font-bold text-white font-playfair" x-text="imgTitle"></h3>
            </div>
        </div>
    </div>

</section>