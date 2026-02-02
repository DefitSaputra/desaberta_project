<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->title }} - Desa Berta</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    <article class="pt-32 pb-24 min-h-screen">
        {{-- Breadcrumb & Judul --}}
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-12">
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 text-sm text-berta-sage hover:text-berta-olive mb-6 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Kembali ke Daftar Berita
            </a>
            
            <h1 class="text-3xl md:text-5xl font-bold text-white font-playfair leading-tight mb-6">{{ $berita->title }}</h1>
            
            <div class="flex items-center justify-center gap-4 text-sm text-berta-sage">
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d F Y') }}
                </span>
                <span class="w-1.5 h-1.5 bg-berta-olive rounded-full"></span>
                <span class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    Admin Desa
                </span>
            </div>
        </div>

        {{-- Featured Image --}}
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 mb-12">
            <div class="relative aspect-video rounded-2xl overflow-hidden shadow-2xl border border-white/10">
                <img src="{{ asset('storage/' . $berita->thumbnail) }}" alt="{{ $berita->title }}" class="w-full h-full object-cover">
            </div>
        </div>

        {{-- Konten Artikel (Prose) --}}
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="prose prose-lg prose-invert prose-headings:font-playfair prose-a:text-berta-olive hover:prose-a:text-berta-cream mx-auto">
                {!! $berita->content !!}
            </div>
            
            {{-- Share / Footer Artikel --}}
            <div class="mt-16 pt-8 border-t border-white/10 flex justify-between items-center">
                <span class="text-berta-sage text-sm font-bold uppercase tracking-widest">Bagikan Informasi Ini</span>
                <div class="flex gap-4">
                    {{-- Tombol Share Medsos (Opsional, Link Placeholder) --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" target="_blank" class="text-white/50 hover:text-blue-500 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path></svg></a>
                    <a href="https://wa.me/?text={{ url()->current() }}" target="_blank" class="text-white/50 hover:text-green-500 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654z"/></svg></a>
                </div>
            </div>
        </div>
    </article>

    @include('components.footer')

</body>
</html>