<?php

namespace App\Http\Controllers;

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
        return view('kabar-tani');
    }

    public function pengguna()
    {
        return view('data-pengguna');
    }
}
