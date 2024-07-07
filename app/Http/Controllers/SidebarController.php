<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
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
        $pengguna = User::wherein('level_user', ['masyarakat' , 'admin'])->get();
        // dd($pengguna);
        return view('data-pengguna', ['pengguna' => $pengguna]);
    }

    public function profil()
    {
        return view('profil');
    }

    public function detailBerita($id_berita)
    {
        $berita = Berita::find($id_berita);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }
        return view('detail-kabar-tani', ['berita' => $berita]);
    }
}
