<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Add middleware that restricts access to /admin to only those coming via the footer entry point
        $this->app->make(\Illuminate\Routing\Router::class)->pushMiddlewareToGroup('web', \App\Http\Middleware\RequireFooterAdminAccess::class);

        // Record public site visits for simple traffic analytics
        $this->app->make(\Illuminate\Routing\Router::class)->pushMiddlewareToGroup('web', \App\Http\Middleware\RecordSiteVisit::class);
    }
}
