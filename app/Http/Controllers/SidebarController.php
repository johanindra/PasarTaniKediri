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
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->nama_user = $request->nama;
        $user->alamat_user = $request->alamat;
        $user->kecamatan_user = $request->kecamatan;
        $user->notelp_user = $request->no_telp;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/fotos'), $filename);
            $user->foto = $filename;
        }

        $user->save();

        return redirect()->route('dashboardadmin')->with('success', 'Profil Anda berhasil diperbarui.');
    }
}
