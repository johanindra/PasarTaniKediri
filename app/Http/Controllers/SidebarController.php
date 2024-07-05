<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    public function dashboard()
    {
        return view('dashboard');
    }

    public function produk()
    {
        return view('produk');
    }

    public function berita()
    {
        $berita = Berita::get();
        return view('kabar-tani', ['berita' => $berita]);
    }

    public function pengguna()
    {
        return view('data-pengguna');
    }

    public function profil()
    {
        return view('profil');
    }
}
