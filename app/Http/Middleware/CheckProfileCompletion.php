<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckProfileCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (empty($user->alamat_user) || empty($user->kecamatan_user) || empty($user->notelp_user)) {
            return redirect()->route('lengkapi-profil');
        }

        return $next($request);
    }
}
