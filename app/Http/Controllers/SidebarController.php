<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Produk;
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
        if (Auth::user()->hasRole('admin')) {
            $produk = Produk::get();
        } else {
            $produk = Produk::where('id_user', Auth::user()->id_user)->get();
        }
        return view('produk', ['produk' => $produk]);
    }
    public function produktani()
    {
        return view('produk-tani');
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

    public function detailpengguna($id_user)
    {
        $pengguna = User::find($id_user);
        if (!$pengguna) {
            return redirect()->back()->with('error', 'Pengguna tidak ditemukan');
        }

        // Mengambil produk yang sesuai dengan id_user
        $produk = Produk::where('id_user', $id_user)->get();

        return view('detail-pengguna', ['pengguna' => $pengguna, 'produk' => $produk]);
    }


    public function profil()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function detailBerita($id_berita)
    {
        $berita = Berita::find($id_berita);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }
        return view('detail-kabar-tani', ['berita' => $berita]);
    }

    public function detailProduk($id_produk)
    {
        $produk = Produk::find($id_produk);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }
        return view('detail-produk', ['produk' => $produk]);
    }


    public function lengkapi()
    {
        $user = Auth::user();
        return view('lengkapi-profil', compact('user'));
    }

    public function updateProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'foto_user' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama_user = $request->nama;
        $user->alamat_user = $request->alamat;
        $user->kecamatan_user = $request->kecamatan;
        $user->notelp_user = $request->no_telp;

        if ($request->hasFile('foto_user')) {
            $foto = $request->file('foto_user');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'Foto Profil User';
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $user->foto_user = $nama_foto;
        }

        $user->save();

        return redirect()->route('dashboardadmin')->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
