<div x-data="{ 
        activeSlide: 0,
        slides: [
            {
                id: 0,
                title: 'Selamat Datang di Desa Berta',
                subtitle: 'KEC. SUSUKAN • KAB. BANJARNEGARA',
                desc: 'Wilayah seluas 478 Hektar yang terdiri dari 5 Dusun: Dananyuda, Pete, Krajan, Kalibangkang, & Mertelu.',
                image: '{{ asset('img/pemandangan.jpg') }}', // Ganti dengan foto Landscape Desa
                cta: 'Jelajahi Profil'
            },
            {
                id: 1,
                title: 'Pusat Ekonomi Kreatif',
                subtitle: 'UMKM & POTENSI LOKAL',
                desc: 'Rumah bagi pengrajin Anyaman Piti, produsen Gula Kelapa murni, dan industri Mebeler berkualitas.',
                image: '{{ asset('img/umkm.jpg') }}', // Ganti dengan foto Kerajinan/UMKM
                cta: 'Lihat Potensi'
            },
            {
                id: 2,
                title: 'Tradisi yang Lestari',
                subtitle: 'BUDAYA & KEARIFAN LOKAL',
                desc: 'Menjaga warisan leluhur melalui tradisi Suran, Sadran, Sedekah Bumi, dan Tumpengan yang guyub rukun.',
                image: '{{ asset('img/budaya.png') }}', // Ganti dengan foto Budaya/Kegiatan
                cta: 'Galeri Desa'
            }
        ],
        timer: null,
        startAutoSlide() {
            this.timer = setInterval(() => {
                this.next();
            }, 3000); // 3000ms = 3 Detik
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
    class="relative w-full h-screen overflow-hidden bg-berta-dark">

    <template x-for="slide in slides" :key="slide.id">
        <div x-show="activeSlide === slide.id"
             x-transition:enter="transition transform duration-1000 ease-in-out"
             x-transition:enter-start="opacity-0 scale-105"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition transform duration-1000 ease-in-out"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute inset-0 flex items-center justify-center">
            
            <div class="absolute inset-0 z-0">
                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover filter brightness-[0.6]">
                <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/60 via-transparent to-berta-dark/90"></div>
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/stardust.png')]"></div>
            </div>

            <div class="relative z-10 text-center px-4 max-w-5xl mx-auto mt-10">
                <div class="inline-block py-1 px-4 rounded-full border border-berta-sage/30 bg-berta-dark/40 backdrop-blur-md mb-6 animate-fade-in-up">
                    <span x-text="slide.subtitle" class="text-berta-sage text-xs font-bold tracking-[0.2em] uppercase"></span>
                </div>
                
                <h1 x-text="slide.title" class="text-5xl md:text-7xl lg:text-8xl font-extrabold text-transparent bg-clip-text bg-gradient-to-b from-berta-cream to-berta-sage drop-shadow-2xl mb-6 leading-tight"></h1>
                
                <p x-text="slide.desc" class="text-berta-cream/90 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed mb-10 font-light drop-shadow-md"></p>

                <div>
                    <a href="#profil" class="px-8 py-4 rounded-full bg-berta-olive hover:bg-berta-wood text-white font-bold transition transform hover:-translate-y-1 hover:shadow-[0_10px_20px_rgba(103,111,83,0.4)] border border-white/10">
                        <span x-text="slide.cta"></span>
                    </a>
                </div>
            </div>
        </div>
    </template>

    <button @click="prev()" class="absolute left-4 top-1/2 transform -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-berta-olive/80 text-white backdrop-blur-sm transition z-20 group">
        <svg class="w-6 h-6 group-hover:-translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    
    <button @click="next()" class="absolute right-4 top-1/2 transform -translate-y-1/2 p-3 rounded-full bg-white/10 hover:bg-berta-olive/80 text-white backdrop-blur-sm transition z-20 group">
        <svg class="w-6 h-6 group-hover:translate-x-1 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
        <template x-for="slide in slides" :key="slide.id">
            <button @click="activeSlide = slide.id" 
                    :class="{'bg-berta-olive w-8': activeSlide === slide.id, 'bg-white/30 w-3': activeSlide !== slide.id}"
                    class="h-3 rounded-full transition-all duration-300"></button>
        </template>
    </div>
</div>