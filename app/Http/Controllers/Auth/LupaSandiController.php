<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LupaSandiController extends Controller
{
    public function verifikasi()
    {
        return view('Auth.form-email');
    }
    public function verifikasiotp()
    {
        return view('Auth.formOTP');
    }
    public function lupasandi()
    {
        return view('Auth.lupa-sandi');
    }
    public function verifikasiemail()
    {
        return view('Auth.form-email');
    }
    
}
