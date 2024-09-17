<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminlogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is NOT authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Get the authenticated user
        $user = auth()->user();

        // Check if the user's role is not 'admin', then redirect
        if ($user->role !== 'admin') {
            return redirect()->route('dashboard');
        }

        // Allow the request to proceed
        return $next($request);
    }

}
