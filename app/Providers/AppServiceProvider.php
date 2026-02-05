<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // Wajib import ini

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // --- 1. FIX TAMPILAN RUSAK (WAJIB UTAMA) ---
        // Ini memberitahu Filament/Livewire kalau kita pakai HTTPS
        if($this->app->environment('production') || env('APP_ENV') === 'production') {
            URL::forceScheme('https');
            
            // Baris "Sakti" untuk Hostinger agar Admin Panel rapi:
            request()->server->set('HTTPS', true); 
        }

        // --- 2. LOGIKA SECURITY ANDA (Footer Access) ---
        // Kode ini tetap kita pasang agar fitur keamanan Anda jalan
        try {
            $router = $this->app->make(\Illuminate\Routing\Router::class);
            
            // Cek dulu apakah class-nya ada biar gak error fatal
            if (class_exists(\App\Http\Middleware\RequireFooterAdminAccess::class)) {
                $router->pushMiddlewareToGroup('web', \App\Http\Middleware\RequireFooterAdminAccess::class);
            }
            
            if (class_exists(\App\Http\Middleware\RecordSiteVisit::class)) {
                $router->pushMiddlewareToGroup('web', \App\Http\Middleware\RecordSiteVisit::class);
            }
        } catch (\Exception $e) {
            // Abaikan error middleware agar web tetap jalan
        }
    }
}