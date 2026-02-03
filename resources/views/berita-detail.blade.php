<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->title }} - Desa Berta</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION --}}
    <div class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image Wrapper --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/beritadesa.jpg') }}" 
                 class="w-full h-full object-cover object-center brightness-50" 
                 alt="Detail Berita Desa Berta">
            
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/80 via-berta-dark/40 to-berta-dark"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Teks Hero --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-20">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold tracking-[0.2em] uppercase mb-6 border border-white/20 opacity-0 animate-fade-in-down">
                {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d F Y') }}
            </span>
            
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-6 leading-tight drop-shadow-2xl font-playfair opacity-0 animate-fade-in-up delay-100">
                {{ $berita->title }}
            </h1>
            
            <div class="flex items-center justify-center gap-2 text-white/80 text-sm opacity-0 animate-fade-in-up delay-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                <span>Ditulis oleh <strong class="text-berta-olive">Admin Desa</strong></span>
            </div>
        </div>
    </div>

    {{-- KONTEN ARTIKEL --}}
    {{-- [FIX] Hapus margin negatif (-mt-20) dan ganti padding agar tidak tabrakan --}}
    <article class="relative z-20 bg-berta-dark py-16">
        
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            
            {{-- Navigasi Kembali (Posisi Aman) --}}
            <div class="mb-12 scroll-element opacity-0 translate-y-8">
                <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-white/5 border border-white/10 text-sm font-medium text-berta-sage hover:text-white hover:bg-berta-olive hover:border-berta-olive transition duration-300">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                    Kembali ke Daftar Berita
                </a>
            </div>

            {{-- Featured Image --}}
            <div class="relative aspect-video rounded-[2rem] overflow-hidden shadow-2xl border border-white/10 mb-12 group scroll-element opacity-0 translate-y-8 transition-delay-200">
                <img src="{{ asset('storage/' . $berita->thumbnail) }}" 
                     alt="{{ $berita->title }}" 
                     class="w-full h-full object-cover transform group-hover:scale-105 transition duration-1000 ease-in-out">
            </div>

            {{-- Isi Berita --}}
            <div class="prose prose-lg prose-invert max-w-none prose-headings:font-playfair prose-headings:text-berta-cream prose-p:text-berta-taupe/90 prose-p:leading-relaxed prose-a:text-berta-olive hover:prose-a:text-white prose-strong:text-white prose-blockquote:border-berta-olive prose-blockquote:bg-white/5 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:rounded-r-lg prose-li:text-berta-taupe scroll-element opacity-0 translate-y-8 transition-delay-300">
                {!! $berita->content !!}
            </div>

            {{-- Footer Artikel --}}
            <div class="mt-16 pt-8 border-t border-white/10 flex flex-col sm:flex-row justify-between items-center gap-6 scroll-element opacity-0 translate-y-8">
                <span class="text-berta-sage text-sm font-bold uppercase tracking-widest">Bagikan Informasi Ini</span>
                <div class="flex gap-4">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white/50 hover:text-white hover:bg-blue-600 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg>
                    </a>
                    <a href="https://wa.me/?text={{ url()->current() }}" target="_blank" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white/50 hover:text-white hover:bg-green-500 transition duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z"/></svg>
                    </a>
                    <button onclick="window.print()" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center text-white/50 hover:text-white hover:bg-berta-wood transition duration-300" title="Cetak Artikel">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                    </button>
                </div>
            </div>

        </div>
    </article>

    @include('components.footer')

    {{-- Script Animasi --}}
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
        .font-playfair { font-family: 'Playfair Display', serif; }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
        
        .delay-100 { animation-delay: 0.15s; }
        .delay-200 { animation-delay: 0.3s; }
        .delay-300 { animation-delay: 0.45s; }

        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 800ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        .transition-delay-200 { transition-delay: 200ms; }
        .transition-delay-300 { transition-delay: 300ms; }
    </style>

</body>
</html>