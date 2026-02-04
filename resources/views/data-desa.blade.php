<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Statistik - Desa Berta</title>    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- CHART.JS CDN --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="antialiased bg-berta-dark text-berta-cream font-sans selection:bg-berta-olive selection:text-white overflow-x-hidden">

    @include('components.navbar')

    {{-- HERO SECTION --}}
    <div class="relative h-[60vh] flex items-center justify-center overflow-hidden">
        
        {{-- Background Image Wrapper --}}
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/datadesa.jpg') }}" 
                 class="w-full h-full object-cover object-center brightness-50" 
                 alt="Statistik Desa Berta">
            
            <div class="absolute inset-0 bg-gradient-to-b from-berta-dark/60 via-berta-dark/30 to-berta-dark"></div>
            <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-10 mix-blend-overlay"></div>
        </div>
        
        {{-- Konten Teks Hero --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10 pt-20">
            <span class="inline-block px-4 py-1.5 rounded-full bg-white/10 backdrop-blur-md text-white text-xs font-bold tracking-[0.2em] uppercase mb-6 border border-white/20 opacity-0 animate-fade-in-down">
                Transparansi Data
            </span>
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight drop-shadow-2xl opacity-0 animate-fade-in-up delay-100">
                Statistik <span class="text-berta-olive">Desa Berta</span>
            </h1>
            <p class="text-white/90 max-w-2xl mx-auto text-lg font-light leading-relaxed opacity-0 animate-fade-in-up delay-200">
                Data kependudukan dan demografi desa yang akurat, transparan, dan terbarukan sebagai dasar pembangunan.
            </p>
        </div>
    </div>

    {{-- SECTION: RINGKASAN TOTAL PENDUDUK --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-20">
        @php
            $totalPenduduk = $dataUmur->sum('jumlah_total'); 
            $totalL = $dataUmur->sum('jumlah_laki');
            $totalP = $dataUmur->sum('jumlah_perempuan');

            $agregatDesa = \App\Models\StatistikPenduduk::where('kategori', 'kabupaten')->first();
            if($agregatDesa) {
                $totalPenduduk = $agregatDesa->jumlah_total;
                $totalL = $agregatDesa->jumlah_laki;
                $totalP = $agregatDesa->jumlah_perempuan;
            }
        @endphp
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- Kartu Total --}}
            <div class="bg-berta-olive p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-1 transition duration-300 border border-white/10 scroll-element opacity-0 translate-y-8">
                <h3 class="text-berta-dark font-bold uppercase text-sm tracking-wider mb-1">Total Penduduk</h3>
                <span class="text-4xl font-extrabold text-white">{{ number_format($totalPenduduk) }}</span>
                <span class="text-berta-dark/70 text-sm font-medium block mt-1">Jiwa</span>
            </div>
            {{-- Kartu Laki-laki --}}
            <div class="bg-berta-dark/90 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-1 transition duration-300 scroll-element opacity-0 translate-y-8 transition-delay-200">
                <h3 class="text-berta-sage font-bold uppercase text-sm tracking-wider mb-1">Laki-laki</h3>
                <span class="text-4xl font-extrabold text-blue-400">{{ number_format($totalL) }}</span>
                <span class="text-berta-sage/70 text-sm font-medium block mt-1">Jiwa</span>
            </div>
            {{-- Kartu Perempuan --}}
            <div class="bg-berta-dark/90 backdrop-blur-md border border-white/10 p-6 rounded-2xl shadow-lg text-center transform hover:-translate-y-1 transition duration-300 scroll-element opacity-0 translate-y-8 transition-delay-300">
                <h3 class="text-berta-sage font-bold uppercase text-sm tracking-wider mb-1">Perempuan</h3>
                <span class="text-4xl font-extrabold text-pink-400">{{ number_format($totalP) }}</span>
                <span class="text-berta-sage/70 text-sm font-medium block mt-1">Jiwa</span>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-24 space-y-24">

        {{-- 1. SECTION: KELOMPOK UMUR --}}
        <section class="scroll-element opacity-0 translate-y-8">
            <div class="mb-8 border-l-4 border-berta-olive pl-4">
                <h3 class="text-2xl font-bold text-white font-playfair">Berdasarkan Kelompok Umur</h3>
                <p class="text-berta-sage text-sm">Sebaran penduduk berdasarkan rentang usia.</p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2 bg-white/5 p-6 rounded-2xl border border-white/10 shadow-lg">
                    <canvas id="chartUmur"></canvas>
                </div>
                <div class="bg-berta-dark border border-white/10 rounded-2xl overflow-hidden max-h-[400px] overflow-y-auto custom-scrollbar">
                    <table class="w-full text-sm text-left text-berta-sage">
                        <thead class="text-xs text-berta-olive uppercase bg-white/5 sticky top-0 backdrop-blur-md">
                            <tr>
                                <th class="px-6 py-3">Usia</th>
                                <th class="px-6 py-3 text-right">L</th>
                                <th class="px-6 py-3 text-right">P</th>
                                <th class="px-6 py-3 text-right">Jml</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataUmur as $d)
                            <tr class="border-b border-white/5 hover:bg-white/5">
                                <td class="px-6 py-4 font-medium text-white whitespace-nowrap">{{ $d->label }}</td>
                                <td class="px-6 py-4 text-right">{{ number_format($d->jumlah_laki) }}</td>
                                <td class="px-6 py-4 text-right">{{ number_format($d->jumlah_perempuan) }}</td>
                                <td class="px-6 py-4 text-right font-bold text-berta-cream">{{ number_format($d->jumlah_total) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        {{-- 2. SECTION: PEKERJAAN --}}
        <section class="scroll-element opacity-0 translate-y-8">
            <div class="mb-8 border-l-4 border-berta-olive pl-4">
                <h3 class="text-2xl font-bold text-white font-playfair">Berdasarkan Pekerjaan</h3>
                <p class="text-berta-sage text-sm">Mata pencaharian utama penduduk (Diurutkan dari terbanyak).</p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <div class="lg:col-span-2 bg-white/5 p-6 rounded-2xl border border-white/10 shadow-lg">
                    <div class="relative h-[1000px]">
                        <canvas id="chartPekerjaan"></canvas>
                    </div>
                </div>

                <div class="bg-berta-dark border border-white/10 rounded-2xl overflow-hidden max-h-[1000px] overflow-y-auto custom-scrollbar">
                    <table class="w-full text-sm text-left text-berta-sage">
                        <thead class="text-xs text-berta-olive uppercase bg-white/5 sticky top-0 backdrop-blur-md z-10">
                            <tr>
                                <th class="px-6 py-3">Jenis Pekerjaan</th>
                                <th class="px-6 py-3 text-right">Jml</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataPekerjaan as $d)
                            <tr class="border-b border-white/5 hover:bg-white/5">
                                <td class="px-6 py-3 font-medium text-white">
                                    {{ $d->label }}
                                    <div class="w-full bg-white/10 rounded-full h-1 mt-1">
                                        <div class="bg-berta-olive h-1 rounded-full" style="width: {{ ($d->jumlah_total / $totalPenduduk) * 100 }}%"></div>
                                    </div>
                                </td>
                                <td class="px-6 py-3 text-right font-bold text-berta-cream">{{ number_format($d->jumlah_total) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        {{-- 3. SECTION: PENDIDIKAN --}}
        <section class="scroll-element opacity-0 translate-y-8">
            <div class="mb-8 border-l-4 border-berta-olive pl-4">
                <h3 class="text-2xl font-bold text-white font-playfair">Pendidikan Terakhir</h3>
                <p class="text-berta-sage text-sm">Jenjang pendidikan yang telah ditempuh penduduk.</p>
            </div>
            <div class="bg-white/5 p-6 rounded-2xl border border-white/10 shadow-lg">
                <canvas id="chartPendidikan"></canvas>
            </div>
        </section>

        {{-- 4. SECTION: AGAMA & STATUS KAWIN --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 scroll-element opacity-0 translate-y-8">
            {{-- Agama --}}
            <section class="bg-white/5 p-6 rounded-2xl border border-white/10 shadow-lg flex flex-col">
                <div class="mb-6 border-l-4 border-berta-olive pl-4">
                    <h3 class="text-xl font-bold text-white font-playfair">Agama</h3>
                </div>
                <div class="flex-grow flex items-center justify-center">
                    <canvas id="chartAgama"></canvas>
                </div>
            </section>

            {{-- Status Kawin --}}
            <section class="bg-white/5 p-6 rounded-2xl border border-white/10 shadow-lg flex flex-col">
                <div class="mb-6 border-l-4 border-berta-olive pl-4">
                    <h3 class="text-xl font-bold text-white font-playfair">Status Perkawinan</h3>
                    <p class="text-berta-sage text-xs font-bold tracking-wide uppercase mt-1 text-yellow-500">
                        *Data Kepala Keluarga
                    </p>
                </div>
                <div class="flex-grow flex items-center justify-center">
                    <canvas id="chartKawin"></canvas>
                </div>
            </section>
        </div>

    </div>

    @include('components.footer')

    {{-- Script Animasi Scroll --}}
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

    {{-- SCRIPT GRAPHIC (Chart.js) --}}
    <script>
        Chart.defaults.color = '#a3b18a';
        Chart.defaults.borderColor = 'rgba(255,255,255,0.05)';
        Chart.defaults.font.family = "'Poppins', sans-serif";
        
        const colorOlive = '#84cc16'; 
        const colorSage = '#a3b18a';
        const colorWood = '#dda15e';
        const colorBlue = '#3b82f6';
        const colorPink = '#ec4899';
        const colorYellow = '#f59e0b';
        const colorRed = '#ef4444';

        // 1. CHART UMUR
        new Chart(document.getElementById('chartUmur'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($dataUmur->pluck('label')) !!},
                datasets: [
                    { label: 'Laki-laki', data: {!! json_encode($dataUmur->pluck('jumlah_laki')) !!}, backgroundColor: colorBlue, borderWidth: 0 },
                    { label: 'Perempuan', data: {!! json_encode($dataUmur->pluck('jumlah_perempuan')) !!}, backgroundColor: colorPink, borderWidth: 0 }
                ]
            },
            options: { responsive: true, maintainAspectRatio: false, scales: { x: { stacked: false }, y: { stacked: false } } }
        });

        // 2. CHART PEKERJAAN
        new Chart(document.getElementById('chartPekerjaan'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($dataPekerjaan->pluck('label')) !!},
                datasets: [{
                    label: 'Jumlah Penduduk',
                    data: {!! json_encode($dataPekerjaan->pluck('jumlah_total')) !!},
                    backgroundColor: colorOlive, 
                    borderRadius: 4,
                    barPercentage: 0.8,
                    categoryPercentage: 0.9
                }]
            },
            options: { 
                indexAxis: 'y', 
                responsive: true, 
                maintainAspectRatio: false, 
                scales: {
                    y: {
                        ticks: {
                            autoSkip: false, 
                            font: { size: 11 }
                        }
                    }
                },
                plugins: { legend: { display: false } }
            }
        });

        // 3. CHART PENDIDIKAN
        new Chart(document.getElementById('chartPendidikan'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($dataPendidikan->pluck('label')) !!},
                datasets: [{
                    label: 'Jumlah Orang',
                    data: {!! json_encode($dataPendidikan->pluck('jumlah_total')) !!},
                    backgroundColor: colorWood, borderRadius: 4
                }]
            },
            options: { indexAxis: 'y', responsive: true, plugins: { legend: { display: false } } }
        });

        // 4. CHART AGAMA
        new Chart(document.getElementById('chartAgama'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($dataAgama->pluck('label')) !!},
                datasets: [{
                    data: {!! json_encode($dataAgama->pluck('jumlah_total')) !!},
                    backgroundColor: [colorOlive, colorWood, colorBlue, colorPink, colorYellow], borderWidth: 0
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });

        // 5. CHART STATUS KAWIN
        new Chart(document.getElementById('chartKawin'), {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($dataKawin->pluck('label')) !!},
                datasets: [{
                    data: {!! json_encode($dataKawin->pluck('jumlah_total')) !!},
                    backgroundColor: [colorSage, colorBlue, colorYellow, colorRed], borderWidth: 0
                }]
            },
            options: { plugins: { legend: { position: 'bottom' } } }
        });
    </script>

    <style>
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar { width: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: rgba(255,255,255,0.05); }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #84cc16; border-radius: 10px; }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #65a30d; }
        
        /* Animations */
        @keyframes fadeInUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes fadeInDown { from { opacity: 0; transform: translateY(-20px); } to { opacity: 1; transform: translateY(0); } }
        .animate-fade-in-up { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-fade-in-down { animation: fadeInDown 0.8s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }

        /* Scroll Element Transition */
        .scroll-element {
            transition-property: opacity, transform;
            transition-duration: 800ms;
            transition-timing-function: cubic-bezier(0.16, 1, 0.3, 1);
        }
        
        /* Transition Delays */
        .transition-delay-200 { transition-delay: 200ms; }
        .transition-delay-300 { transition-delay: 300ms; }
    </style>

</body>
</html>