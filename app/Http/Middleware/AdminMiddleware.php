<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Jika belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Jika bukan admin
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('beranda')
                ->with('error', 'Anda tidak memiliki hak akses.');
        }

        // Jika admin
        return $next($request);
    }
}