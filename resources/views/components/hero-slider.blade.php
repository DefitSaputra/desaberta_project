<div x-data="{ 
        activeSlide: 0,
        slides: [
            {
                id: 0,
                title: 'Selamat Datang di Desa Berta',
                subtitle: 'KEC. SUSUKAN • KAB. BANJARNEGARA',
                desc: 'Wilayah seluas 478 Hektar yang terdiri dari 5 Dusun: Dananyuda, Pete, Krajan, Kalibangkang, & Mertelu.',
                image: '{{ asset('img/pemandangan.jpg') }}', 
                cta: 'Jelajahi Profil',
                link: '{{ route('profil.desa') }}' // [FIX] Mengarah ke Profil
            },
            {
                id: 1,
                title: 'Pusat Ekonomi Kreatif',
                subtitle: 'UMKM & POTENSI LOKAL',
                desc: 'Rumah bagi pengrajin Anyaman Piti, produsen Gula Kelapa murni, dan industri Mebeler berkualitas.',
                image: '{{ asset('img/umkm.jpg') }}', 
                cta: 'Lihat Potensi',
                link: '{{ route('potensi.desa') }}' // [FIX] Mengarah ke Potensi
            },
            {
                id: 2,
                title: 'Tradisi yang Lestari',
                subtitle: 'BUDAYA & KEARIFAN LOKAL',
                desc: 'Menjaga warisan leluhur melalui tradisi Suran, Sadran, Sedekah Bumi, dan Tumpengan yang guyub rukun.',
                image: '{{ asset('img/budaya.png') }}', 
                cta: 'Galeri Desa',
                link: '{{ route('galeri.index') }}' // [FIX] Mengarah ke Galeri
            }
        ],
        timer: null,
        startAutoSlide() {
            this.timer = setInterval(() => {
                this.next();
            }, 5000); // Saya ubah jadi 5 detik agar lebih enak dibaca
        },
        stopAutoSlide() {
            clearInterval(this.timer);
        },
        next() {
            this.activeSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
        },
        prev() {
            this.activeSlide = (this.activeSlide === 0) ? this.slides.length - 1 : this.activeSlide - 1;
        }
    }" 
    x-init="startAutoSlide()" 
    @mouseenter="stopAutoSlide()" 
    @mouseleave="startAutoSlide()"
    class="relative w-full h-screen overflow-hidden bg-berta-dark group/slider">

    {{-- SLIDES --}}
    <template x-for="slide in slides" :key="slide.id">
        <div x-show="activeSlide === slide.id"
             x-transition:enter="transition transform duration-1000 ease-in-out"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition transform duration-1000 ease-in-out"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0 flex items-center justify-center">
            
            {{-- Background Image --}}
            <div class="absolute inset-0 z-0">
                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover filter brightness-[0.5]">
                <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/60 via-transparent to-berta-dark/90"></div>
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
            </div>

            {{-- Content --}}
            <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-10">
                
                {{-- Subtitle (Animation: Fade In Down) --}}
                <div class="inline-block py-1.5 px-6 rounded-full border border-berta-sage/30 bg-white/5 backdrop-blur-md mb-8 opacity-0 animate-fade-in-down">
                    <span x-text="slide.subtitle" class="text-berta-olive text-xs font-bold tracking-[0.25em] uppercase"></span>
                </div>
                
                {{-- Title (Animation: Fade In Up + Delay 100ms) --}}
                <h1 x-text="slide.title" class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-white drop-shadow-2xl mb-6 leading-tight font-playfair opacity-0 animate-fade-in-up delay-100"></h1>
                
                {{-- Description (Animation: Fade In Up + Delay 200ms) --}}
                <p x-text="slide.desc" class="text-white/80 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10 font-light drop-shadow-md opacity-0 animate-fade-in-up delay-200"></p>

                {{-- Button (Animation: Fade In Up + Delay 300ms) --}}
                <div class="opacity-0 animate-fade-in-up delay-300">
                    {{-- [FIX] Menggunakan :href untuk binding link dinamis --}}
                    <a :href="slide.link" class="group inline-flex items-center gap-3 px-8 py-4 rounded-full bg-berta-olive hover:bg-berta-wood text-white font-bold transition-all duration-300 transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(103,111,83,0.4)] border border-white/10">
                        <span x-text="slide.cta"></span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
    </template>

    {{-- NAVIGATION ARROWS (Hidden on mobile, show on hover desktop) --}}
    <button @click="prev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 p-4 rounded-full bg-white/5 hover:bg-berta-olive text-white/50 hover:text-white backdrop-blur-sm transition duration-300 z-20 group hidden md:flex hover:scale-110 border border-white/10">
        <svg class="w-6 h-6 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    
    <button @click="next()" class="absolute right-4 top-1/2 transform -translate-y-1/2 p-4 rounded-full bg-white/5 hover:bg-berta-olive text-white/50 hover:text-white backdrop-blur-sm transition duration-300 z-20 group hidden md:flex hover:scale-110 border border-white/10">
        <svg class="w-6 h-6 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    {{-- DOTS INDICATOR --}}
    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-4 z-20">
        <template x-for="slide in slides" :key="slide.id">
            <button @click="activeSlide = slide.id" 
                    :class="{'bg-berta-olive w-12': activeSlide === slide.id, 'bg-white/20 w-3 hover:bg-white/40': activeSlide !== slide.id}"
                    class="h-3 rounded-full transition-all duration-500"></button>
        </template>
    </div>

    {{-- STYLE ANIMASI CSS --}}
    <style>
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-30px); } to { opacity: 1; transform: translateY(0); } }
        
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
        
        .delay-100 { animation-delay: 0.15s; }
        .delay-200 { animation-delay: 0.3s; }
        .delay-300 { animation-delay: 0.45s; }
    </style>
</div>