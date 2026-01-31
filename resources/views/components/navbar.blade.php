<nav x-data="{ open: false, scrolled: false }" 
     @scroll.window="scrolled = (window.pageYOffset > 20) ? true : false"
     :class="{ 'bg-berta-dark/90 border-b border-berta-sage/10': scrolled, 'bg-transparent border-transparent': !scrolled }"
     class="fixed w-full z-50 transition-all duration-500 backdrop-blur-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-24">
            
            <div class="flex-shrink-0 flex items-center gap-3 cursor-pointer group">
                <a href="{{ url('/') }}" class="relative flex items-center gap-3">
                    <div class="relative">
                        <div class="absolute inset-0 bg-berta-olive blur-md opacity-0 group-hover:opacity-50 transition duration-500 rounded-full"></div>
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="relative w-10 h-auto z-10 transform group-hover:scale-110 transition duration-300">
                    </div>
                    <div class="flex flex-col">
                        <span class="font-bold text-xl tracking-wide text-berta-cream leading-tight group-hover:text-white transition">Desa<span class="text-berta-olive">Berta</span></span>
                        <span class="text-[0.6rem] text-berta-sage uppercase tracking-widest">Banjarnegara</span>
                    </div>
                </a>
            </div>

            <div class="hidden lg:flex space-x-8 items-center">
                <a href="{{ url('/') }}" class="text-sm font-medium text-berta-sage hover:text-white transition relative group {{ Request::is('/') ? 'text-white' : '' }}">
                    Beranda <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('profil.desa') }}" class="text-sm font-medium text-berta-sage hover:text-white transition relative group {{ Request::routeIs('profil.desa') ? 'text-white' : '' }}">
                    Profil <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full {{ Request::routeIs('profil.desa') ? 'w-full' : '' }}"></span>
                </a>

                <a href="{{ url('/') }}#statistik" class="text-sm font-medium text-berta-sage hover:text-white transition relative group">
                    Data <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('struktur.lengkap') }}" class="text-sm font-medium text-berta-sage hover:text-white transition relative group {{ Request::routeIs('struktur.lengkap') ? 'text-white' : '' }}">
                    Pemerintahan <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full {{ Request::routeIs('struktur.lengkap') ? 'w-full' : '' }}"></span>
                </a>

                <a href="{{ url('/') }}#peta" class="text-sm font-medium text-berta-sage hover:text-white transition relative group">
                    Peta <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full"></span>
                </a>

                <a href="{{ route('potensi.desa') }}" class="text-sm font-medium text-berta-sage hover:text-white transition relative group {{ Request::routeIs('potensi.desa') ? 'text-white' : '' }}">
                    Potensi <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-berta-olive transition-all group-hover:w-full {{ Request::routeIs('potensi.desa') ? 'w-full' : '' }}"></span>
                </a>
            </div>

            <div class="-mr-2 flex items-center lg:hidden">
                <button @click="open = ! open" class="p-2 text-berta-sage hover:text-white transition">
                    <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>
    </div>
    
    <div x-show="open" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-5"
         x-transition:enter-end="opacity-100 translate-y-0"
         class="lg:hidden bg-berta-dark/95 border-b border-berta-sage/20 backdrop-blur-xl absolute w-full h-screen">
        <div class="px-4 pt-2 pb-6 space-y-2">
            <a href="{{ url('/') }}" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition {{ Request::is('/') ? 'bg-berta-olive/10 text-white' : '' }}">Beranda</a>
            <a href="{{ route('profil.desa') }}" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition {{ Request::routeIs('profil.desa') ? 'bg-berta-olive/10 text-white' : '' }}">Profil Desa</a>
            <a href="{{ url('/') }}#statistik" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition">Data Desa</a>
            <a href="{{ route('struktur.lengkap') }}" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition {{ Request::routeIs('struktur.lengkap') ? 'bg-berta-olive/10 text-white' : '' }}">Pemerintahan</a>
            <a href="{{ url('/') }}#peta" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition">Peta Wilayah</a>
            <a href="{{ route('potensi.desa') }}" class="block px-4 py-3 text-berta-sage hover:text-white hover:bg-berta-olive/20 rounded-lg transition {{ Request::routeIs('potensi.desa') ? 'bg-berta-olive/10 text-white' : '' }}">Potensi Desa</a>
        </div>
    </div>
</nav>