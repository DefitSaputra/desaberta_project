<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kabar Desa - Desa Berta</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION (Background beritadesa.jpeg) --}}
    <div class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image Wrapper --}}
        <div class="absolute inset-0 z-0">
            {{-- Gambar beritadesa.jpeg --}}
            <img src="{{ asset('img/beritadesa.jpg') }}" 
                 class="w-full h-full object-cover object-center brightness-50" 
                 alt="Kabar Desa Berta">
            
            {{-- Overlay Gradasi (Agar teks terbaca) --}}
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/80 via-berta-dark/30 to-berta-dark"></div>
            
            {{-- Noise Texture --}}
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Teks Hero --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-20">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold tracking-[0.2em] uppercase mb-6 border border-white/20 opacity-0 animate-fade-in-down">
                Arsip Informasi
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-2xl opacity-0 animate-fade-in-up delay-100">
                Kabar <span class="text-berta-olive">Desa Berta</span>
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-lg font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Informasi terkini, pengumuman, dan artikel kegiatan seputar Desa Berta.
            </p>
        </div>
    </div>

    {{-- LIST BERITA --}}
    {{-- Margin negatif dihapus, diganti dengan padding atas (py-16) agar rapi --}}
    <section class="py-16 bg-berta-dark relative z-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($berita as $item)
                {{-- [ANIMASI] Tambahkan scroll-element dan delay bertingkat --}}
                <article class="flex flex-col bg-berta-dark border border-white/10 rounded-[1.5rem] overflow-hidden hover:-translate-y-2 transition-all duration-300 group shadow-xl hover:shadow-2xl hover:shadow-berta-olive/10 scroll-element opacity-0 translate-y-8"
                         style="transition-delay: {{ ($loop->index % 3) * 100 }}ms">
                    
                    <a href="{{ route('berita.show', $item->slug) }}" class="relative h-60 overflow-hidden block">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        
                        {{-- Overlay Gelap saat Hover --}}
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition duration-500"></div>
                        
                        {{-- Badge Tanggal di Atas Gambar --}}
                        <div class="absolute top-4 left-4 bg-berta-dark/80 backdrop-blur-md px-3 py-1 rounded-lg border border-white/10 text-xs text-white font-medium">
                            {{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}
                        </div>
                    </a>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        {{-- Meta Info --}}
                        <div class="flex items-center gap-2 text-xs text-berta-sage mb-3">
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            <span>Admin Desa</span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-berta-olive transition">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h3>

                        <p class="text-berta-sage/80 text-sm line-clamp-3 mb-6 flex-grow leading-relaxed">
                            {!! Str::limit(strip_tags($item->content), 120) !!}
                        </p>

                        <div class="mt-auto border-t border-white/5 pt-4 flex justify-between items-center">
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-sm font-bold text-berta-olive uppercase tracking-wider hover:text-white transition flex items-center gap-1 group/btn">
                                Baca Selengkapnya 
                                <svg class="w-4 h-4 transform group-hover/btn:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full flex flex-col items-center justify-center py-20 text-center animate-pulse">
                    <div class="w-16 h-16 bg-white/5 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-8 h-8 text-berta-sage" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                    </div>
                    <p class="text-berta-sage text-lg font-medium">Belum ada berita yang diterbitkan saat ini.</p>
                    <p class="text-berta-sage/60 text-sm mt-1">Silakan kembali lagi nanti untuk informasi terbaru.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-16">
                {{ $berita->links() }}
            </div>
        </div>
    </section>

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

        /* Scroll Element Transition */
        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 800ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
    </style>

</body>
</html>