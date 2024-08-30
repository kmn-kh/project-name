<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Islogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is NOT authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.'); // Redirect to login route
        }

        // Allow the request to proceed if the user is authenticated
        return $next($request);
    }
}
