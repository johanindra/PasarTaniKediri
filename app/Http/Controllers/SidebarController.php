<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::user()->hasRole('admin')) {
            $berita = Berita::get();
        } else {
            $berita = Berita::where('id_user', Auth::user()->id_user)->get();
        }
        return view('kabar-tani', ['berita' => $berita]);
    }

    public function pengguna()
    {
        $pengguna = User::role(['masyarakat', 'kelompok_tani'])->get();
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
