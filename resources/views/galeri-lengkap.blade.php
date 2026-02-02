<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Desa Berta - Dokumentasi Lengkap</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- Header Section --}}
    <section class="relative pt-32 pb-20 bg-berta-dark overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 mix-blend-overlay pointer-events-none"></div>
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-berta-olive/10 rounded-full blur-[120px] pointer-events-none"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-3 block">Arsip Visual</span>
            <h1 class="text-4xl md:text-6xl font-bold text-berta-cream mb-6 font-playfair">Galeri Desa Berta</h1>
            <p class="text-berta-sage text-lg max-w-2xl mx-auto leading-relaxed">
                Kumpulan dokumentasi kegiatan, pembangunan, potensi alam, dan seni budaya yang menjadi saksi perjalanan Desa Berta.
            </p>
        </div>
    </section>

    {{-- Gallery Grid Section (Dengan Modal) --}}
    <section class="py-16 bg-berta-coffee/5 min-h-screen"
             x-data="{ 
                open: false, 
                imgSrc: '', 
                imgTitle: '', 
                imgDesc: '',
                imgCat: '',
                showModal(src, title, cat, desc) {
                    this.open = true;
                    this.imgSrc = src;
                    this.imgTitle = title;
                    this.imgCat = cat;
                    this.imgDesc = desc;
                }
             }">
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6">
                @forelse($galeri as $item)
                <div class="break-inside-avoid group relative rounded-2xl overflow-hidden cursor-zoom-in shadow-lg hover:shadow-berta-olive/20 transition-all duration-500 bg-berta-dark border border-white/5"
                     @click="showModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}', '{{ $item->category }}', '{{ $item->description }}')">
                    
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                         class="w-full h-auto object-cover transform transition duration-700 ease-in-out group-hover:scale-105">
                    
                    <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/50 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-6">
                        <span class="text-xs font-bold text-berta-olive uppercase tracking-wider mb-1">{{ $item->category }}</span>
                        <h4 class="text-lg font-bold text-white leading-tight">{{ $item->title }}</h4>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20 text-berta-sage opacity-50">
                    <p class="text-xl">Belum ada data galeri.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-16">
                {{ $galeri->links() }} 
            </div>

        </div>

        {{-- Modal Preview (Pop-up) --}}
        <div x-show="open" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-md p-4"
             style="display: none;">
            
            <button @click="open = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition transform hover:rotate-90 duration-300 z-50">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="relative max-w-6xl w-full flex flex-col md:flex-row gap-8 items-center" @click.away="open = false">
                {{-- Gambar Besar --}}
                <div class="w-full md:w-3/4">
                    <img :src="imgSrc" class="w-full h-auto max-h-[85vh] object-contain rounded-lg shadow-2xl mx-auto" alt="Detail Galeri">
                </div>
                
                {{-- Detail Teks (Muncul di samping pada desktop) --}}
                <div class="w-full md:w-1/4 text-left space-y-4">
                    <div>
                        <span class="text-berta-olive text-xs font-bold uppercase tracking-widest block mb-2" x-text="imgCat"></span>
                        <h3 class="text-3xl font-bold text-white font-playfair leading-tight" x-text="imgTitle"></h3>
                    </div>
                    <div class="w-10 h-1 bg-white/20 rounded-full"></div>
                    <p class="text-berta-sage text-sm leading-relaxed" x-text="imgDesc ? imgDesc : 'Tidak ada deskripsi tambahan.'"></p>
                </div>
            </div>
        </div>

    </section>

    @include('components.footer')
    
</body>
</html>