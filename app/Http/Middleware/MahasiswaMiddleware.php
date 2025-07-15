<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'mahasiswa') {
            return $next($request);
        }

        abort(403, 'Akses ditolak. Anda bukan mahasiswa.');
    }
}
