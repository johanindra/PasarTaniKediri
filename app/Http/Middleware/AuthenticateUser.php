<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthenticateUser
{
    public function handle($request, Closure $next)
    {
        // Periksa apakah pengguna sudah diautentikasi
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Anda belum login, silakan login terlebih dahulu.');
        }

        // Periksa apakah pengguna memiliki level 'admin'
        $user = Auth::user();
        if ($user->level_user !== 'admin') {
            return redirect('login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Lanjutkan permintaan jika pengguna diautentikasi dan memiliki level 'admin'
        return $next($request);
    }
}
