<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckEmailVerification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->session()->has('email') || !$request->session()->has('otp')) {
            // Set flash message for alert
            Session::flash('error', 'Masukkan email terlebih dahulu');

            return redirect()->route('verifikasi-email');
        }

        return $next($request);
    }
}
