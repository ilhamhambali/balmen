<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // 1. Periksa apakah pengguna sudah login dan memiliki peran.
        if (!Auth::check() || !$request->user()->role) {
            // Jika tidak, kembalikan ke halaman login.
            return redirect('login');
        }

        // 2. Periksa apakah nama peran pengguna TIDAK SAMA DENGAN peran yang diizinkan.
        // Kita menggunakan 'nama_peran' sesuai dengan kolom di tabel 'roles' Anda.
        if ($request->user()->role->nama_peran !== $role) {
            // Jika tidak cocok, alihkan ke halaman utama dengan pesan error.
            return redirect()->route('home')->with('error', 'You do not have permission to access this page.');
        }

        // 3. Jika peran cocok, izinkan akses ke halaman yang dituju.
        return $next($request);
    }
}
