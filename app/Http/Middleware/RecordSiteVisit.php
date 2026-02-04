<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SiteVisit;

class RecordSiteVisit
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Only record GET requests for public pages
        if (! $request->isMethod('GET')) {
            return $next($request);
        }

        $path = trim($request->path(), '/');

        // Skip admin, filament, assets, api, and vite/hot calls
        if (preg_match('#^(admin|filament|api|_debugbar|hot)($|/)#', $path)) {
            return $next($request);
        }

        // Proceed and save after response to ensure status is 200
        $response = $next($request);

        try {
            if (method_exists($response, 'getStatusCode') && $response->getStatusCode() === 200) {
                SiteVisit::create([
                    'session_id' => session()->getId(),
                    'ip' => $request->ip(),
                    'path' => '/' . $path,
                    'method' => $request->method(),
                    'user_agent' => substr($request->userAgent() ?? '', 0, 1000),
                    'referer' => $request->headers->get('referer'),
                ]);
            }
        } catch (\Throwable $e) {
            // Don't let visit logging break the app
            logger()->warning('Failed to record site visit: ' . $e->getMessage());
        }

        return $response;
    }
}
