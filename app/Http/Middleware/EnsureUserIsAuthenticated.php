<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {

        if (!Auth::check()) {
            // If the user is not authenticated, redirect to the login page
            return redirect()->route('login')->withErrors(['error' => 'You must be logged in to access this page.']);
        }

        // If the user is authenticated and tries to access login or register routes, redirect to home
        if (Auth::check() && ($request->routeIs('login') || $request->routeIs('register'))) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
