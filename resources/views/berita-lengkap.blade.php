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

    {{-- Header --}}
    <section class="relative pt-32 pb-16 bg-berta-dark overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-5 mix-blend-overlay pointer-events-none"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <span class="text-berta-olive font-bold tracking-widest uppercase text-sm mb-3 block">Arsip Informasi</span>
            <h1 class="text-4xl md:text-5xl font-bold text-berta-cream mb-4 font-playfair">Kabar Desa Berta</h1>
            <p class="text-berta-sage text-lg max-w-2xl mx-auto">Informasi terkini, pengumuman, dan artikel kegiatan seputar Desa Berta.</p>
        </div>
    </section>

    {{-- List Berita --}}
    <section class="py-16 bg-berta-coffee/5 min-h-screen">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($berita as $item)
                <article class="flex flex-col bg-berta-dark border border-white/5 rounded-2xl overflow-hidden hover:border-berta-olive/50 transition-all duration-300 group shadow-lg">
                    <a href="{{ route('berita.show', $item->slug) }}" class="relative h-60 overflow-hidden">
                        <img src="{{ asset('storage/' . $item->thumbnail) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                        <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition"></div>
                    </a>
                    
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-berta-sage mb-3">
                            <span class="bg-white/10 px-2 py-1 rounded">{{ \Carbon\Carbon::parse($item->published_at)->format('d M Y') }}</span>
                            <span>•</span>
                            <span>Oleh Admin</span>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-3 leading-snug group-hover:text-berta-olive transition">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h3>

                        <p class="text-berta-sage/80 text-sm line-clamp-3 mb-6 flex-grow">
                            {!! Str::limit(strip_tags($item->content), 150) !!}
                        </p>

                        <div class="mt-auto border-t border-white/5 pt-4">
                            <a href="{{ route('berita.show', $item->slug) }}" class="text-sm font-bold text-berta-olive uppercase tracking-wider hover:text-white transition">Baca Selengkapnya &rarr;</a>
                        </div>
                    </div>
                </article>
                @empty
                <div class="col-span-full text-center py-20">
                    <p class="text-berta-sage text-xl">Belum ada berita yang diterbitkan.</p>
                </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $berita->links() }}
            </div>
        </div>
    </section>

    @include('components.footer')

</body>
</html>