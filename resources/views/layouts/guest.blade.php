<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Desa Berta') }}</title>
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-berta-cream antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-berta-dark relative overflow-hidden">
            
            <div class="absolute top-[-10%] left-[-10%] w-[500px] h-[500px] bg-berta-olive/20 rounded-full blur-[120px] pointer-events-none"></div>
            <div class="absolute bottom-[-10%] right-[-10%] w-[500px] h-[500px] bg-berta-wood/20 rounded-full blur-[120px] pointer-events-none"></div>

            <div class="relative z-10 mb-6">
                <a href="/" class="flex flex-col items-center gap-2 group">
                    <div class="w-16 h-16 bg-gradient-to-br from-berta-olive to-berta-wood rounded-2xl flex items-center justify-center shadow-lg shadow-berta-coffee/40 transition transform group-hover:rotate-6">
                        <span class="font-bold text-berta-cream text-4xl">D</span>
                    </div>
                    <span class="font-bold text-2xl tracking-wide text-berta-cream">Desa<span class="text-berta-sage">Berta</span></span>
                </a>
            </div>

            <div class="relative z-10 w-full sm:max-w-md mt-6 px-8 py-8 bg-berta-wood/10 backdrop-blur-md border border-berta-sage/10 shadow-2xl shadow-black/40 overflow-hidden sm:rounded-3xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>