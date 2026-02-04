<?php

namespace App\Filament\Widgets;

use App\Models\Berita;
use App\Models\Galeri;
use App\Models\StatistikPenduduk;
use App\Models\SiteVisit;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?int $sort = 1;
    protected static bool $isLazy = false;
    protected static ?string $pollingInterval = '10s'; // Lebih cepat untuk feel live

    protected function getStats(): array
    {
        $now = Carbon::now();
        
        // ==========================================
        // 1. TRAFFIC ANALYTICS (Enhanced)
        // ==========================================
        
        // Kunjungan Hari Ini vs Kemarin
        $visitsToday = SiteVisit::whereDate('created_at', $now->toDateString())->count();
        $visitsYesterday = SiteVisit::whereDate('created_at', $now->copy()->subDay()->toDateString())->count();
        
        // Trend Analysis
        $percentChange = $visitsYesterday > 0 
            ? round((($visitsToday - $visitsYesterday) / $visitsYesterday) * 100, 1)
            : 0;
        
        $trendIcon = $percentChange >= 0 ? 'heroicon-m-arrow-trending-up' : 'heroicon-m-arrow-trending-down';
        $trendColor = $percentChange >= 0 ? 'success' : 'danger';
        $trendDesc = $percentChange >= 0 
            ? "+{$percentChange}% dari kemarin" 
            : "{$percentChange}% dari kemarin";

        // Chart Data: 7 Hari Terakhir (Weekly Trend)
        $weeklyVisits = [];
        for ($i = 6; $i >= 0; $i--) {
            $weeklyVisits[] = SiteVisit::whereDate(
                'created_at', 
                now()->subDays($i)->toDateString()
            )->count();
        }

        // Online Users (Last 5 minutes)
        $onlineNow = SiteVisit::where('created_at', '>=', now()->subMinutes(5))
            ->distinct('session_id')
            ->count('session_id');

        // Peak Hour Today
        $peakHour = SiteVisit::whereDate('created_at', today())
            ->selectRaw('HOUR(created_at) as hour, COUNT(*) as total')
            ->groupBy('hour')
            ->orderByDesc('total')
            ->first();
        
        $peakHourText = $peakHour 
            ? "Peak: " . str_pad($peakHour->hour, 2, '0', STR_PAD_LEFT) . ":00 ({$peakHour->total} hits)"
            : "Belum ada data peak hour";

        // ==========================================
        // 2. POPULASI & DEMOGRAFI
        // ==========================================

        $totalPenduduk = StatistikPenduduk::where('kategori', 'umur')->sum('jumlah_total');
        $lakiLaki = StatistikPenduduk::where('kategori', 'umur')->sum('jumlah_laki');
        $perempuan = StatistikPenduduk::where('kategori', 'umur')->sum('jumlah_perempuan');
        
        $genderRatio = $perempuan > 0 
            ? round(($lakiLaki / $perempuan) * 100, 1) 
            : 0;

        // Chart: Gender Distribution (Simple representation)
        $genderChart = [$lakiLaki, $perempuan, $totalPenduduk];

        // ==========================================
        // 3. KONTEN DIGITAL ANALYTICS
        // ==========================================

        $totalBerita = Berita::count();
        $beritaPublished = Berita::where('is_published', true)->count();
        $totalGaleri = Galeri::count();
        $galeriActive = Galeri::where('is_active', true)->count();
        
        $totalAset = $totalBerita + $totalGaleri;
        $publishRate = $totalAset > 0 
            ? round((($beritaPublished + $galeriActive) / $totalAset) * 100, 1)
            : 0;

        // Chart: Content Growth (Last 30 days)
        $contentGrowth = [];
        for ($i = 29; $i >= 0; $i--) {
            $date = now()->subDays($i)->toDateString();
            $contentGrowth[] = Berita::whereDate('created_at', $date)->count() + 
                               Galeri::whereDate('created_at', $date)->count();
        }

        // Berita Terbaru Hari Ini
        $beritaToday = Berita::whereDate('created_at', today())->count();

        // ==========================================
        // 4. ENGAGEMENT METRICS
        // ==========================================
        
        // Rata-rata kunjungan per hari (7 hari terakhir)
        $avgVisitsPerDay = round(array_sum($weeklyVisits) / 7, 1);
        
        // Total kunjungan bulan ini
        $visitsThisMonth = SiteVisit::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        // ==========================================
        // 5. RENDER STATS CARDS
        // ==========================================

        return [
            // --- CARD 1: LIVE MONITOR (Pulse Effect) ---
            Stat::make('👥 Online Sekarang', $onlineNow)
                ->description($peakHourText)
                ->descriptionIcon('heroicon-m-signal')
                ->color('danger')
                ->chart(array_merge(array_fill(0, 10, rand(1, 5)), [$onlineNow])) // Simulated heartbeat
                ->extraAttributes([
                    'class' => 'relative overflow-hidden bg-gradient-to-br from-red-50 to-orange-50 dark:from-red-950 dark:to-orange-950 ring-2 ring-red-500/20 shadow-lg shadow-red-500/10',
                ]),

            // --- CARD 2: DAILY TRAFFIC (Trend Analysis) ---
            Stat::make('📊 Kunjungan Hari Ini', number_format($visitsToday))
                ->description($trendDesc)
                ->descriptionIcon($trendIcon)
                ->color($trendColor)
                ->chart($weeklyVisits) // 7-day trend
                ->extraAttributes([
                    'class' => 'bg-gradient-to-br from-blue-50 to-cyan-50 dark:from-blue-950 dark:to-cyan-950 hover:shadow-xl hover:scale-[1.02] transition-all duration-300',
                ]),

            // --- CARD 3: POPULATION (Gender Breakdown) ---
            Stat::make('🏘️ Total Penduduk', number_format($totalPenduduk))
                ->description("♂️ {$lakiLaki} | ♀️ {$perempuan} (Rasio: {$genderRatio}%)")
                ->descriptionIcon('heroicon-m-user-group')
                ->color('info')
                ->chart($genderChart)
                ->extraAttributes([
                    'class' => 'bg-gradient-to-br from-indigo-50 to-purple-50 dark:from-indigo-950 dark:to-purple-950 hover:shadow-xl hover:scale-[1.02] transition-all duration-300',
                ]),

            // --- CARD 4: CONTENT LIBRARY (Publication Rate) ---
            Stat::make('📚 Arsip Digital', $totalAset)
                ->description("📰 {$beritaPublished} Berita | 📸 {$galeriActive} Galeri ({$publishRate}% Live)")
                ->descriptionIcon('heroicon-m-document-duplicate')
                ->color('warning')
                ->chart($contentGrowth) // 30-day content growth
                ->extraAttributes([
                    'class' => 'bg-gradient-to-br from-amber-50 to-yellow-50 dark:from-amber-950 dark:to-yellow-950 hover:shadow-xl hover:scale-[1.02] transition-all duration-300',
                ]),

            // --- CARD 5: MONTHLY OVERVIEW ---
            Stat::make('📅 Bulan Ini', number_format($visitsThisMonth))
                ->description("Rata-rata: {$avgVisitsPerDay} kunjungan/hari")
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('success')
                ->chart(array_slice($weeklyVisits, -7)) // Last week mini trend
                ->extraAttributes([
                    'class' => 'bg-gradient-to-br from-emerald-50 to-green-50 dark:from-emerald-950 dark:to-green-950 hover:shadow-xl hover:scale-[1.02] transition-all duration-300',
                ]),

            // --- CARD 6: CONTENT ACTIVITY TODAY ---
            Stat::make('✍️ Aktivitas Hari Ini', $beritaToday)
                ->description("Berita baru dipublikasikan")
                ->descriptionIcon('heroicon-m-pencil-square')
                ->color('primary')
                ->chart([$beritaToday, $beritaToday * 2, $beritaToday]) // Simple activity indicator
                ->extraAttributes([
                    'class' => 'bg-gradient-to-br from-teal-50 to-cyan-50 dark:from-teal-950 dark:to-cyan-950 hover:shadow-xl hover:scale-[1.02] transition-all duration-300',
                ]),
        ];
    }
}