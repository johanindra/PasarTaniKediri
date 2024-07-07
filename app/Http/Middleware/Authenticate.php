<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string
    {
        return route('login');
        // Periksa apakah pengguna sudah diautentikasi
        //  if (!Auth::check()) {
        //     return redirect('login')->with('error', 'Anda belum login, silakan login terlebih dahulu.');
        // }

        // // Periksa apakah pengguna memiliki level 'admin'
        // $user = Auth::user();
        // if (!$user) {
        //     return redirect('login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        // }

        // // Lanjutkan permintaan jika pengguna diautentikasi dan memiliki level 'admin'
        // return $next($request);
    }
}
