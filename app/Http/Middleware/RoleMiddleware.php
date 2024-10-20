<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  $role
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        // Cek apakah pengguna terautentikasi
        if (!$request->user()) {
            return redirect('/login'); // Arahkan ke halaman login jika tidak terautentikasi
        }

        // Debugging: Mencetak role pengguna dan yang diminta
        logger('User role: ' . $request->user()->role); 
        logger('Requested role: ' . $role); 

        // Cek apakah role pengguna sesuai dengan yang diminta
        // Jika Anda ingin mendukung beberapa role, Anda bisa menggunakan explode
        // $roles = explode('|', $role); // Contoh jika role dipisahkan dengan '|'

        if ($request->user()->role !== $role) {
            abort(403, 'Unauthorized action.'); // Arahkan ke halaman 403 jika tidak memiliki hak akses
        }

        return $next($request); // Lanjutkan ke permintaan berikutnya
    }
}
