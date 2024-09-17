<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Get the authenticated user
            $user = auth()->user();

            // Check the user's role and redirect accordingly
            if ($user->role === 'admin') {
                return redirect()->route('dashboardAdmin');
            }
            
            return redirect()->route('dashboard');
        }

        // If the user is not authenticated, proceed with the request
        return $next($request);
    }

}
