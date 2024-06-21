<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function dashboard()
    {
        return view('Admin.dashboard');
    }
    
    public function produk()
    {
        return view('Admin.produk');
    }
    
    public function berita()
    {
        return view('Admin.berita');
    }

    public function keluar()
    {
        return view('welcome'); //untuk keluar dan menampilkan landing page
    }
}
