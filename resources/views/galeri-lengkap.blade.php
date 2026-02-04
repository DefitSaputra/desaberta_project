<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Galeri Desa Berta - Dokumentasi Lengkap</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION --}}
    <div class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image Wrapper --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/galeridesa.jpg') }}" 
                 class="w-full h-full object-cover object-center brightness-50" 
                 alt="Galeri Desa Berta">
            
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/80 via-berta-dark/30 to-berta-dark"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Teks Hero --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-20">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold tracking-[0.2em] uppercase mb-6 border border-white/20 opacity-0 animate-fade-in-down">
                Arsip Visual
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-2xl opacity-0 animate-fade-in-up delay-100">
                Galeri <span class="text-berta-olive">Desa Berta</span>
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-lg font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Kumpulan dokumentasi kegiatan, pembangunan, potensi alam, dan seni budaya yang menjadi saksi perjalanan Desa Berta.
            </p>
        </div>
    </div>

    {{-- Gallery Grid Section (Dengan Modal) --}}
    <section class="py-16 -mt-20 relative z-20 min-h-screen"
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
                {{-- [ANIMASI] Menambahkan class 'scroll-element' dan 'opacity-0' --}}
                <div class="break-inside-avoid group relative rounded-2xl overflow-hidden cursor-zoom-in shadow-xl hover:shadow-2xl hover:shadow-berta-olive/20 transition-all duration-500 bg-berta-dark border border-white/10 scroll-element opacity-0 translate-y-8"
                     style="transition-delay: {{ ($loop->iteration % 3) * 100 }}ms"
                     @click="showModal('{{ asset('storage/' . $item->image) }}', '{{ $item->title }}', '{{ $item->category }}', '{{ $item->description }}')">
                    
                    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" 
                         class="w-full h-auto object-cover transform transition duration-700 ease-in-out group-hover:scale-105">
                    
                    {{-- Overlay Info saat Hover --}}
                    <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/60 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 flex flex-col justify-end p-6">
                        <span class="text-xs font-bold text-berta-olive uppercase tracking-widest mb-1">{{ $item->category }}</span>
                        <h4 class="text-lg font-bold text-white leading-tight">{{ $item->title }}</h4>
                    </div>
                </div>
                @empty
                <div class="col-span-full text-center py-20">
                    <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mx-auto mb-4 animate-bounce">
                        <svg class="w-8 h-8 text-berta-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    <p class="text-xl text-berta-sage font-medium">Belum ada foto galeri.</p>
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
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="fixed inset-0 z-[100] flex items-center justify-center bg-black/95 backdrop-blur-md p-4"
             style="display: none;">
            
            <button @click="open = false" class="absolute top-6 right-6 text-white/50 hover:text-white transition transform hover:rotate-90 duration-300 z-50 focus:outline-none">
                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="relative max-w-6xl w-full flex flex-col md:flex-row gap-8 items-center" @click.away="open = false">
                <div class="w-full md:w-3/4">
                    <img :src="imgSrc" class="w-full h-auto max-h-[85vh] object-contain rounded-lg shadow-2xl mx-auto" alt="Detail Galeri">
                </div>
                
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
    
    {{-- Script untuk Animasi Scroll --}}
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
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        
        .animate-fade-in-up { animation: fadeInUp 1s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 1s ease-out forwards; }
        
        .delay-100 { animation-delay: 0.2s; }
        .delay-200 { animation-delay: 0.4s; }

        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 1000ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>
    
</body>
</html>