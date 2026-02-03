<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RequireFooterAdminAccess
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $path = trim($request->path(), '/');

        // Only match the exact admin prefix: "admin" or "admin/...". This prevents
        // accidentally matching routes like "admin-entry" used for granting access.
        if (preg_match('#^admin($|/)#', $path)) {
            $allowedAt = $request->session()->get('allowed_admin_at');

            // Allow when the session flag exists and is not older than 10 minutes
            if (! $allowedAt || Carbon::createFromTimestamp($allowedAt)->diffInMinutes(now()) > 10) {
                // Hide the admin page if not allowed
                abort(404);
            }

            // Refresh the session flag so it stays valid while the admin is used
            $request->session()->put('allowed_admin_at', now()->timestamp);
        }

        return $next($request);
    }
}
