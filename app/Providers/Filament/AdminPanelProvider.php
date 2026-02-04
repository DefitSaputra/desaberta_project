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
use Filament\Support\Enums\MaxWidth;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\HtmlString;
use App\Http\Middleware\RequireFooterAdminAccess;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            
            // --- 1. ENHANCED BRANDING ---
            ->brandName('Desa Berta Digital')
            ->favicon(asset('img/logo.png'))
            ->brandLogo(fn () => new HtmlString('
                <div class="flex items-center gap-3 group">
                    <div class="relative">
                        <img src="'.asset('img/logo.png').'" alt="Logo" class="h-10 w-auto drop-shadow-xl transition-transform group-hover:scale-110 duration-300" />
                        <div class="absolute inset-0 bg-primary-500/20 blur-xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col">
                        <span class="font-extrabold text-xl tracking-tight text-gray-900 leading-none bg-gradient-to-r from-primary-600 to-primary-800 bg-clip-text" style="font-family: \'Outfit\', sans-serif;">
                            Desa<span class="text-primary-600">Berta</span>
                        </span>
                        <span class="text-[0.65rem] font-bold text-gray-400 uppercase tracking-[0.25em] leading-none mt-1.5 opacity-75">
                            Control Center
                        </span>
                    </div>
                </div>
            '))
            ->brandLogoHeight('3.5rem')
            
            // --- 2. ENHANCED CONFIG ---
            ->darkMode(false) 
            ->sidebarCollapsibleOnDesktop()
            ->maxContentWidth(MaxWidth::Full)
            ->topNavigation(false)
            ->breadcrumbs(false)
            ->spa() // Enable SPA mode untuk transisi lebih smooth
            
            // --- 3. MODERN COLOR PALETTE ---
            ->colors([
                'primary' => Color::hex('#436850'),
                'gray' => Color::Slate,
                'info' => Color::hex('#3b82f6'),
                'success' => Color::hex('#10b981'),
                'warning' => Color::hex('#f59e0b'),
                'danger' => Color::hex('#ef4444'),
            ])
            
            // --- 4. PREMIUM FONTS ---
            ->font('Outfit')
            
            // --- 5. SIDEBAR FOOTER WIDGET (NEW) ---
            ->renderHook(
                'panels::sidebar.footer',
                fn () => new HtmlString('
                    <div class="pb-6 px-4">
                        <div class="relative overflow-hidden rounded-xl bg-gradient-to-br from-white/80 to-primary-50/50 border border-primary-100/50 p-4 shadow-sm backdrop-blur-sm group transition-all hover:shadow-md hover:border-primary-200">
                            
                            <div class="absolute right-0 top-0 -mt-4 -mr-4 h-24 w-24 rounded-full bg-primary-500/10 blur-2xl group-hover:bg-primary-500/20 transition duration-700"></div>
                            
                            <div class="relative z-10 flex flex-col gap-3">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="p-1.5 rounded-lg bg-primary-100/50 text-primary-700">
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.384-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path></svg>
                                        </div>
                                        <span class="text-[10px] font-bold uppercase tracking-wider text-gray-500">System Status</span>
                                    </div>
                                    <span class="flex h-2 w-2 relative">
                                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-green-400 opacity-75"></span>
                                        <span class="relative inline-flex h-2 w-2 rounded-full bg-green-500"></span>
                                    </span>
                                </div>
                                
                                <div>
                                    <div class="flex items-baseline gap-1">
                                        <span class="text-xl font-extrabold text-gray-800 tracking-tight">Stable</span>
                                        <span class="text-[10px] font-medium text-gray-400">v1.0.0</span>
                                    </div>
                                    <div class="text-[10px] text-gray-500 font-medium leading-tight mt-0.5">
                                        Sistem berjalan normal
                                    </div>
                                </div>
                                
                                <div class="w-full bg-gray-100 rounded-full h-1.5 overflow-hidden">
                                    <div class="bg-gradient-to-r from-primary-400 to-primary-600 h-1.5 rounded-full" style="width: 100%"></div>
                                </div>
                                
                                <div class="pt-2 mt-1 border-t border-gray-100 flex justify-between items-center text-[9px] text-gray-400 font-medium">
                                    <span>&copy; '.date('Y').' Desa Berta</span>
                                    <span class="hover:text-primary-600 cursor-pointer transition">Support</span>
                                </div>
                            </div>
                        </div>
                    </div>
                ')
            )

            // --- 6. ADVANCED CUSTOM STYLES ---
            ->renderHook(
                'panels::head.end',
                fn (): string => '
                    <style>
                        @import url("https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&display=swap");

                        :root {
                            --c-primary: #436850;
                            --c-primary-light: rgba(67, 104, 80, 0.08);
                            --c-glass: rgba(255, 255, 255, 0.8);
                            --c-shadow: rgba(0, 0, 0, 0.04);
                        }

                        /* ==========================================
                           ANIMATED BACKGROUND
                        ========================================== */
                        body {
                            background: linear-gradient(135deg, #fdfefe 0%, #f8faf9 100%);
                            background-attachment: fixed;
                            position: relative;
                            overflow-x: hidden;
                        }

                        body::before {
                            content: "";
                            position: fixed;
                            top: 0;
                            left: 0;
                            width: 100%;
                            height: 100%;
                            background-image: 
                                radial-gradient(circle at 20% 30%, rgba(67, 104, 80, 0.03) 0%, transparent 40%),
                                radial-gradient(circle at 80% 70%, rgba(179, 180, 154, 0.04) 0%, transparent 40%),
                                radial-gradient(circle at 40% 80%, rgba(67, 104, 80, 0.02) 0%, transparent 30%);
                            pointer-events: none;
                            z-index: 0;
                        }

                        /* Floating Orbs */
                        body::after {
                            content: "";
                            position: fixed;
                            width: 600px;
                            height: 600px;
                            background: radial-gradient(circle, rgba(67, 104, 80, 0.06), transparent 70%);
                            border-radius: 50%;
                            top: -200px;
                            right: -200px;
                            animation: float 20s ease-in-out infinite;
                            pointer-events: none;
                            z-index: 0;
                        }

                        @keyframes float {
                            0%, 100% { transform: translate(0, 0) scale(1); }
                            33% { transform: translate(-50px, 50px) scale(1.1); }
                            66% { transform: translate(30px, -30px) scale(0.9); }
                        }

                        /* ==========================================
                           SIDEBAR STYLING
                        ========================================== */
                        
                        /* Fix Sidebar Overflow & Height */
                        .fi-sidebar {
                            background: rgba(255, 255, 255, 0.85) !important;
                            backdrop-filter: blur(20px) saturate(200%);
                            border-right: 1px solid rgba(67, 104, 80, 0.08);
                            box-shadow: 4px 0 30px rgba(0, 0, 0, 0.03);
                            
                            /* Ensure sticky/fixed positioning works */
                            position: sticky !important; 
                            top: 0 !important;
                            height: 100vh !important;
                            z-index: 50 !important;
                            overflow-y: auto !important;
                            
                            /* Decorative gradient at bottom to fill space */
                            background-image: 
                                linear-gradient(to bottom, rgba(255,255,255,0.8), rgba(255,255,255,0.6)),
                                radial-gradient(circle at bottom right, rgba(67, 104, 80, 0.05), transparent 50%);
                            background-repeat: no-repeat;
                            background-position: center;
                            background-size: cover;
                        }

                        /* Nav Item Spacing */
                        .fi-sidebar-nav-groups {
                            gap: 0.75rem;
                            padding: 1.5rem 1rem;
                        }

                        .fi-sidebar-item {
                            border-radius: 12px;
                            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                            position: relative;
                            overflow: hidden;
                            margin-bottom: 4px;
                        }

                        .fi-sidebar-item::before {
                            content: "";
                            position: absolute;
                            left: 0;
                            top: 0;
                            height: 100%;
                            width: 4px;
                            background: var(--c-primary);
                            transform: scaleY(0);
                            transition: transform 0.3s ease;
                            border-radius: 0 4px 4px 0;
                        }

                        .fi-sidebar-item-active {
                            background: linear-gradient(90deg, var(--c-primary-light), transparent) !important;
                            color: var(--c-primary) !important;
                            font-weight: 700;
                        }

                        .fi-sidebar-item-active::before {
                            transform: scaleY(1);
                        }

                        .fi-sidebar-item:hover {
                            background: rgba(67, 104, 80, 0.04);
                            padding-left: 4px; /* Subtle movement */
                        }

                        .fi-sidebar-group-label {
                            font-weight: 800;
                            letter-spacing: 0.05em;
                            color: #94a3b8;
                            font-size: 0.7rem;
                            text-transform: uppercase;
                            margin-top: 1rem;
                        }

                        /* ==========================================
                           TOPBAR
                        ========================================== */
                        .fi-topbar {
                            background: rgba(255, 255, 255, 0.9) !important;
                            backdrop-filter: blur(16px);
                            border-bottom: 1px solid rgba(0, 0, 0, 0.04);
                            position: sticky;
                            top: 0;
                            z-index: 40;
                        }

                        /* ==========================================
                           CARDS & WIDGETS
                        ========================================== */
                        .fi-section, .fi-widget, .fi-ta-ctn {
                            background: white !important;
                            border-radius: 24px !important;
                            border: 1px solid rgba(0, 0, 0, 0.04) !important;
                            box-shadow: 0 10px 40px -10px rgba(0,0,0,0.05) !important;
                            transition: all 0.3s ease;
                        }

                        .fi-section:hover, .fi-widget:hover {
                            transform: translateY(-4px);
                            box-shadow: 0 20px 50px -10px rgba(67, 104, 80, 0.1) !important;
                        }

                        /* ==========================================
                           TYPOGRAPHY & BUTTONS
                        ========================================== */
                        h1, h2, h3, .fi-header-heading {
                            font-weight: 800 !important;
                            color: #0f172a !important;
                        }

                        .fi-btn {
                            border-radius: 12px !important;
                            font-weight: 600;
                            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
                        }
                        
                        .fi-btn-primary {
                            background: linear-gradient(135deg, var(--c-primary), #2d4a36) !important;
                            border: none !important;
                        }

                        .fi-input, .fi-select-input {
                            border-radius: 12px !important;
                            background-color: #f8fafc !important;
                            border-color: #e2e8f0 !important;
                        }

                        /* Table Styles */
                        .fi-ta-header-cell {
                            font-weight: 700 !important;
                            text-transform: uppercase;
                            letter-spacing: 0.05em;
                            color: #64748b;
                            background: #f8fafc !important;
                        }
                        
                        /* Stats Card Custom */
                        .fi-wi-stats-overview-stat {
                            background: white !important;
                            border: 1px solid rgba(0,0,0,0.03) !important;
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
                RequireFooterAdminAccess::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}