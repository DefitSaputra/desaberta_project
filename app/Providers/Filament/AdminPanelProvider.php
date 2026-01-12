<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\Support\Enums\MaxWidth; // Tambahan untuk layout lebar
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\HtmlString; // Untuk Custom HTML Logo

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            
            // --- 1. LOGO MODERN (Icon + Teks) ---
            ->brandName('Desa Berta Digital')
            ->brandLogo(fn () => new HtmlString('
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-8 h-8 text-primary-500">
                        <path d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                        <path d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                    </svg>
                    <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">
                        Desa<span class="text-primary-600">Berta</span>
                    </span>
                </div>
            '))
            
            // --- 2. PALET WARNA (Lestrade + Modern Shades) ---
            ->colors([
                'primary' => Color::hex('#676F53'), // Sage Green
                'gray' => Color::Slate, // Slate lebih kebiruan/dingin daripada Stone, lebih modern
                'info' => Color::hex('#A19379'),
                'success' => Color::hex('#1C290D'),
                'warning' => Color::hex('#D97706'), // Sedikit lebih terang biar kebaca
                'danger' => Color::Rose,
            ])
            
            // --- 3. FONT FUTURISTIK ---
            ->font('Outfit') 
            
            // --- 4. TWEAK LAYOUT ---
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth(MaxWidth::Full) // Agar tabel melebar full screen
            ->topNavigation(false) // Sidebar tetap di kiri (klasik tapi fungsional)
            
            // --- 5. CUSTOM CSS (MAGIC SAUCE) ---
            // Ini akan membuat tampilan jadi Glassmorphism & Modern
            ->renderHook(
                'panels::head.end',
                fn (): string => '
                    <style>
                        /* Import Font Outfit */
                        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap");

                        /* Background Pattern Halus */
                        body {
                            background-color: #FEFAEO; /* Warna Cream Lestrade */
                            background-image: radial-gradient(#676F53 0.5px, transparent 0.5px);
                            background-size: 20px 20px;
                        }

                        /* Sidebar Glass Effect */
                        .fi-sidebar {
                            background-color: rgba(255, 255, 255, 0.8) !important;
                            backdrop-filter: blur(10px);
                            border-right: 1px solid rgba(103, 111, 83, 0.1);
                        }

                        /* Card/Widget Glass Effect */
                        .fi-section, .fi-widget, .fi-ta {
                            background-color: rgba(255, 255, 255, 0.7) !important;
                            backdrop-filter: blur(12px);
                            border-radius: 16px !important; /* Sudut lebih bulat */
                            border: 1px solid rgba(255, 255, 255, 0.5);
                            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.05);
                        }

                        /* Tombol Modern */
                        .fi-btn {
                            border-radius: 12px !important;
                            transition: all 0.2s ease-in-out;
                        }
                        .fi-btn:hover {
                            transform: translateY(-2px);
                            box-shadow: 0 4px 12px rgba(103, 111, 83, 0.2);
                        }

                        /* Header Teks Besar */
                        h1, h2, h3 {
                            letter-spacing: -0.025em; /* Tampilan teks rapat ala website modern */
                        }
                    </style>
                '
            )

            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,               
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}