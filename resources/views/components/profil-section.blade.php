<section id="profil" class="py-24 bg-berta-dark relative overflow-hidden" 
         x-data="{
             activeSlide: 0,
             slides: [
                 {
                     img: '{{ asset('img/oldbalaidesa.jpeg') }}',
                     title: 'Sejarah & Tradisi',
                     quote: 'Menjaga warisan leluhur di tengah arus modernisasi.',
                     desc: 'Balai desa lama menjadi saksi bisu perjalanan panjang Desa Berta dalam melestarikan adat istiadat Jawa yang kental seperti Suran dan Sedekah Bumi.'
                 },
                 {
                     img: '{{ asset('img/balaidesa.jpg') }}',
                     title: 'Pusat Pemerintahan',
                     quote: 'Transparansi dan pelayanan publik yang lebih dekat.',
                     desc: 'Kantor Desa Berta yang baru menjadi simbol komitmen kami dalam meningkatkan kualitas pelayanan publik dan akses informasi bagi seluruh warga.'
                 },
                 {
                     img: '{{ asset('img/pepohonan.jpg') }}',
                     title: 'Potensi Alam',
                     quote: 'Harmoni alam yang subur, sumber kehidupan warga.',
                     desc: 'Terbentang seluas 478 Hektar, kekayaan alam Desa Berta dari dataran rendah hingga perbukitan menjadi tulang punggung ekonomi pertanian dan perkebunan.'
                 }
             ],
             init() {
                 setInterval(() => {
                     this.activeSlide = (this.activeSlide + 1) % this.slides.length;
                 }, 4000); // Ganti slide setiap 4 detik
             }
         }">
    
    <div class="absolute top-0 right-0 w-[600px] h-[600px] bg-berta-olive/5 rounded-full blur-[120px] pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-berta-wood/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            <div class="space-y-8 relative">
                <div>
                    <span class="text-berta-olive font-bold tracking-widest uppercase text-xs mb-2 block animate-pulse">Tentang Kami</span>
                    <h2 class="text-3xl md:text-5xl font-bold text-berta-cream mb-4 leading-tight">
                        Mengenal Lebih Dekat <br>
                        <span class="text-berta-sage">Desa Berta</span>
                    </h2>
                    <div class="w-20 h-1.5 bg-gradient-to-r from-berta-olive to-berta-wood rounded-full"></div>
                </div>

                <div class="text-berta-taupe/90 text-lg leading-relaxed space-y-4 text-justify min-h-[180px] relative">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index"
                             x-transition:enter="transition ease-out duration-500"
                             x-transition:enter-start="opacity-0 translate-y-4"
                             x-transition:enter-end="opacity-100 translate-y-0"
                             class="absolute inset-0">
                             <h3 class="text-xl font-bold text-berta-cream mb-2" x-text="slide.title"></h3>
                             <p x-text="slide.desc"></p>
                        </div>
                    </template>
                </div>

                <div class="grid grid-cols-3 gap-6 pt-4 border-t border-berta-sage/10">
                    <div class="text-center lg:text-left">
                        <span class="block text-3xl font-bold text-berta-cream">478</span>
                        <span class="text-xs text-berta-olive font-bold uppercase tracking-wider">Hektar Luas</span>
                    </div>
                    <div class="text-center lg:text-left">
                        <span class="block text-3xl font-bold text-berta-cream">5</span>
                        <span class="text-xs text-berta-olive font-bold uppercase tracking-wider">Dusun</span>
                    </div>
                    <div class="text-center lg:text-left">
                        <span class="block text-3xl font-bold text-berta-cream">4k+</span>
                        <span class="text-xs text-berta-olive font-bold uppercase tracking-wider">Penduduk</span>
                    </div>
                </div>

                <div class="pt-4">
                    <a href="{{ url('/profil-desa') }}" class="group inline-flex items-center gap-3 px-8 py-3 rounded-full bg-berta-wood/20 border border-berta-wood/50 text-berta-cream font-semibold hover:bg-berta-wood hover:border-berta-wood transition-all duration-300 relative overflow-hidden">
                        <span class="relative z-10">Lihat Profil Desa Selengkapnya</span>
                        <svg class="w-5 h-5 group-hover:translate-x-1 transition-transform relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        <div class="absolute top-0 -left-full w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent group-hover:left-full transition-all duration-700 ease-in-out z-0"></div>
                    </a>
                </div>

                <div class="flex gap-2 pt-4">
                    <template x-for="(slide, index) in slides" :key="index">
                        <button @click="activeSlide = index" 
                                :class="{'bg-berta-olive w-6': activeSlide === index, 'bg-berta-sage/30 w-2': activeSlide !== index}"
                                class="h-2 rounded-full transition-all duration-300"></button>
                    </template>
                </div>
            </div>

            <div class="relative group h-[500px]">
                <div class="absolute inset-0 bg-gradient-to-tr from-berta-olive to-berta-wood rounded-[2rem] transform rotate-3 opacity-20 group-hover:rotate-6 transition duration-700 animate-pulse-slow"></div>
                
                <div class="relative rounded-[2rem] overflow-hidden border border-berta-sage/10 shadow-2xl h-full z-10">
                    <template x-for="(slide, index) in slides" :key="index">
                        <div x-show="activeSlide === index"
                             x-transition:enter="transition ease-in-out duration-700"
                             x-transition:enter-start="opacity-0 scale-105"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in-out duration-700"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute inset-0 w-full h-full">
                            <img :src="slide.img" :alt="slide.title" class="w-full h-full object-cover">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-berta-dark via-berta-dark/40 to-transparent opacity-90"></div>
                            
                            <div class="absolute bottom-8 left-8 right-8">
                                <p class="text-berta-cream font-serif italic text-xl leading-relaxed" x-text="`&#34;${slide.quote}&#34;`"></p>
                            </div>
                        </div>
                    </template>
                </div>
                
                <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/30 backdrop-blur-sm text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 hover:bg-berta-olive z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </button>
                <button @click="activeSlide = (activeSlide + 1) % slides.length" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/30 backdrop-blur-sm text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300 hover:bg-berta-olive z-20">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </button>
            </div>

        </div>
    </div>
</section>

<style>
@keyframes pulse-slow {
    0%, 100% { opacity: 0.2; transform: rotate(3deg) scale(1); }
    50% { opacity: 0.3; transform: rotate(4deg) scale(1.02); }
}
.animate-pulse-slow {
    animation: pulse-slow 5s infinite;
}
</style>