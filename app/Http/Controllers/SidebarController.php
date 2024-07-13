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

    public function produk(Request $request)
    {
        $query = Produk::query();

        if (Auth::user()->hasRole('admin')) {
            $query->with('user');
        } else {
            $query->where('id_user', Auth::user()->id_user);
        }

        // Filter berdasarkan kecamatan
        if ($request->filled('kecamatan')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('kecamatan_user', $request->kecamatan);
            });
        }

        // Filter berdasarkan pengguna
        if ($request->filled('pengguna')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->whereHas('roles', function ($roleQuery) use ($request) {
                    $roleQuery->where('name', $request->pengguna);
                });
            });
        }

        $produk = $query->get();

        return view('produk', ['produk' => $produk]);
    }

    public function produktani()
    {
        return view('produk-tani');
    }


    public function berita(Request $request)
    {
        $query = Berita::query();

        if (Auth::user()->hasRole('admin')) {
            $query->with('user');
        } else {
            $query->where('id_user', Auth::user()->id_user);
        }

        // Filter berdasarkan kecamatan
        if ($request->filled('kecamatan')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('kecamatan_user', $request->kecamatan);
            });
        }

        // Filter berdasarkan pengguna
        if ($request->filled('pengguna')) {
            $query->whereHas('user', function ($q) use ($request) {
                $q->whereHas('roles', function ($roleQuery) use ($request) {
                    $roleQuery->where('name', $request->pengguna);
                });
            });
        }

        $berita = $query->get();

        return view('kabar-tani', ['berita' => $berita]);
    }


    public function pengguna(Request $request)
    {
        // Ambil data pengguna berdasarkan peran (role) dan kecamatan (jika ada)
        $query = User::query();

        // Filter berdasarkan peran (role)
        if ($request->pengguna) {
            $query->role([$request->pengguna]);
        } else {
            $query->role(['admin','masyarakat', 'kelompok_tani']);
        }

        // Filter berdasarkan kecamatan
        if ($request->kecamatan) {
            $query->where('kecamatan_user', $request->kecamatan);
        }

        $penggunaList = $query->get(); // Mengubah nama variabel dari $pengguna menjadi $penggunaList

        return view('data-pengguna', [
            'penggunaList' => $penggunaList, // Mengubah nama variabel dari $pengguna menjadi $penggunaList
            'selectedKecamatan' => $request->kecamatan,
            'selectedPengguna' => $request->pengguna,
        ]);
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
        $berita = Berita::findOrFail($id_berita);

        // Memeriksa apakah pengguna yang sedang masuk memiliki akses ke berita
        if (Auth::id() === $berita->id_user || Auth::user()->hasRole('admin')) {
            return view('detail-kabar-tani', ['berita' => $berita]);
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengakses berita ini.');
        }
    }

    public function detailProduk($id_produk)
    {
        $produk = Produk::with('user')->find($id_produk);

        // Memeriksa apakah pengguna yang sedang masuk adalah pemilik produk atau memiliki peran admin
        if (Auth::id() === $produk->id_user || Auth::user()->hasRole('admin')) {
            return view('detail-produk', ['produk' => $produk]);
        } else {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk mengakses produk ini.');
        }
        // $produk = Produk::with('user')->find($id_produk);
        // if (!$produk) {
        //     return redirect()->back()->with('error', 'Produk tidak ditemukan');
        // }
        // return view('detail-produk', ['produk' => $produk]);
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
