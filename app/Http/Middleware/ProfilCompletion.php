<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProfilCompletion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if (!empty($user->alamat_user) && !empty($user->kecamatan_user) && !empty($user->notelp_user)) {
            return redirect()->route('dashboardadmin');
        }

        return $next($request);
    }
}
