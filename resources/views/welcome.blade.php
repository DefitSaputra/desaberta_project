<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desa Berta - Alam & Teknologi</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    <section id="beranda">
        @include('components.hero-slider')
    </section>

    @include('components.jelajahi-section')

    @include('components.sambutan-kades')

    @include('components.peta-section')

    @include('components.struktur-organisasi')

    @include('components.profil-section')

    @include('components.potensi-section')

    @include('components.berita-section')

    @include('components.galeri-section')

    @include('components.footer')

</body>
</html>