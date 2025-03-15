<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SmaAuthController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah user sudah login
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors(['error' => 'Silakan login terlebih dahulu!']);
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Jika user bukan tipe 'sd', logout dan redirect ke login
        if ($user->type !== 'sma') {
            Auth::logout();
            return redirect()->route('login')->withErrors(['error' => 'Akses ditolak!']);
        }

        return $next($request);
    }
}
