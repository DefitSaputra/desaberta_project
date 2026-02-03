<section class="relative py-24 bg-berta-dark overflow-hidden" id="sambutan">
    
    {{-- Background Texture & Blur --}}
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/wood-pattern.png')] opacity-5 mix-blend-overlay"></div>
    <div class="absolute top-1/2 left-0 w-96 h-96 bg-berta-olive/10 rounded-full blur-[120px] pointer-events-none transform -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-berta-wood/5 rounded-full blur-[100px] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            {{-- FOTO KADES --}}
            <div class="lg:col-span-5 relative opacity-0 animate-on-scroll" data-anim-delay="0">
                <div class="relative group">
                    {{-- Frame Border Effect --}}
                    <div class="absolute inset-0 border-2 border-berta-olive/30 rounded-[2rem] transform translate-x-4 translate-y-4 transition duration-500 group-hover:translate-x-2 group-hover:translate-y-2"></div>
                    
                    {{-- Foto Container --}}
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl aspect-[3/4] bg-berta-wood/10 border border-white/5">
                        <img src="{{ asset('img/kades.jpg') }}" 
                             alt="Slamet Riyadi, S.Pd. SD." 
                             class="w-full h-full object-cover object-top transform transition-all duration-700 ease-in-out filter brightness-95 saturate-75 group-hover:scale-105 group-hover:brightness-110 group-hover:saturate-120">
                        
                        {{-- Shine Effect --}}
                        <div class="absolute inset-0 bg-gradient-to-tr from-white/0 via-white/0 to-white/10 opacity-0 group-hover:opacity-100 transition duration-700"></div>

                        {{-- Gradient Bottom --}}
                        <div class="absolute bottom-0 left-0 w-full h-1/2 bg-gradient-to-t from-berta-dark via-berta-dark/60 to-transparent"></div>
                        
                        {{-- Nama Label --}}
                        <div class="absolute bottom-6 left-6 right-6 p-5 bg-black/40 backdrop-blur-md border-t border-white/10 rounded-2xl shadow-lg transform transition duration-500 group-hover:-translate-y-1">
                            <h3 class="text-2xl font-bold text-berta-cream drop-shadow-md tracking-tight">Slamet Riyadi, S.Pd.SD.</h3>
                            <div class="h-0.5 w-12 bg-berta-olive my-2 rounded-full"></div>
                            <p class="text-xs font-bold text-berta-sage uppercase tracking-[0.2em] drop-shadow-sm">
                                Kepala Desa Berta
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- TEKS SAMBUTAN --}}
            <div class="lg:col-span-7 space-y-8 text-left opacity-0 animate-on-scroll" data-anim-delay="200">
                
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-berta-wood/20 border border-berta-wood/30 text-berta-cream text-xs font-bold uppercase tracking-wider">
                    <span class="w-2 h-2 rounded-full bg-berta-wood animate-pulse"></span>
                    Sambutan Kepala Desa
                </div>

                {{-- Judul --}}
                <h2 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-berta-cream to-berta-sage leading-tight">
                    Mewujudkan Desa Berta <br>
                    <span class="italic font-serif text-berta-olive">Mandiri & Berbudaya</span>
                </h2>

                {{-- Quote --}}
                <div class="relative pl-8 border-l-4 border-berta-olive/50">
                    <svg class="absolute -top-4 -left-3 w-8 h-8 text-berta-olive bg-berta-dark" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C19.5693 16 20.017 15.5523 20.017 15V9C20.017 8.44772 19.5693 8 19.017 8H15.017C14.4647 8 14.017 8.44772 14.017 9V11C14.017 11.5523 13.5693 12 13.017 12H12.017V5H22.017V15C22.017 18.3137 19.3307 21 16.017 21H14.017ZM5.01691 21L5.01691 18C5.01691 16.8954 5.91234 16 7.01691 16H10.0169C10.5692 16 11.0169 15.5523 11.0169 15V9C11.0169 8.44772 10.5692 8 10.0169 8H6.01691C5.46462 8 5.01691 8.44772 5.01691 9V11C5.01691 11.5523 4.56919 12 4.01691 12H3.01691V5H13.0169V15C13.0169 18.3137 10.3306 21 7.01691 21H5.01691Z"></path></svg>
                    <p class="text-xl md:text-2xl text-berta-cream font-light italic leading-relaxed">
                        "Teknologi bukan untuk menggantikan tradisi, melainkan untuk memperkuat akar budaya kita dan meluaskan jangkauan potensi Desa Berta ke mata dunia."
                    </p>
                </div>

                {{-- Isi --}}
                <div class="space-y-4 text-berta-sage/90 text-lg leading-relaxed text-justify">
                    <p>Assalamualaikum Warahmatullahi Wabarakatuh.</p>
                    <p>Selamat datang di website resmi Pemerintah Desa Berta. Kehadiran platform digital ini merupakan wujud komitmen kami dalam menghadirkan transparansi pemerintahan dan kemudahan pelayanan publik bagi seluruh warga.</p>
                    <p>Dengan luas wilayah 478 Hektar yang subur, kami mengajak seluruh elemen masyarakat untuk bersinergi. Mari kita kelola potensi alam dan UMKM kita dengan bijak, sembari tetap menjaga kearifan lokal yang telah diwariskan leluhur kita.</p>
                </div>

                {{-- Tanda Tangan / Footer Sambutan --}}
                <div class="pt-6 mt-6 border-t border-berta-sage/10 flex items-center gap-4">
                    <div class="flex flex-col">
                        <span class="text-sm text-berta-sage">Hormat Kami,</span>
                        <span class="font-serif text-3xl text-berta-olive italic">Slamet Riyadi, S.Pd.SD.</span>
                    </div>
                    <div class="ml-auto w-16 h-16 border-2 border-berta-wood/20 rounded-full flex items-center justify-center transform -rotate-12 opacity-50 hover:opacity-100 hover:rotate-0 transition duration-500">
                        <img src="{{ asset('img/logo.png') }}" class="w-8 h-auto opacity-80" alt="Logo">
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>