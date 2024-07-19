<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SidebarController extends Controller
{
    public function login()
    {
        return view('Auth.login');
    }
    public function dashboard(Request $request)
    {
        $user = Auth::user();
        $totalProduk = 0;
        $totalBerita = 0;
        $pengguna = 0;
        $berita = [];
        $produkPerKecamatan = [];
        $produkPerKategori = [];
        $produkDitawarkan = [];
        $filter = $request->filter;

        if ($user->hasRole('admin')) {
            // Jika pengguna adalah admin, hitung semua produk
            $totalProduk = Produk::count();
            $totalBerita = Berita::count();
            $pengguna = User::count();
            $berita = Berita::all();
            $produkPerKecamatan = Produk::join('users', 'produk.id_user', '=', 'users.id_user')
                ->select('users.kecamatan_user', \DB::raw('count(*) as total'))
                ->groupBy('users.kecamatan_user')
                ->pluck('total', 'kecamatan_user')->all();
            $produkPerKategori = Produk::select('kategori_produk', \DB::raw('count(*) as total'))
                ->groupBy('kategori_produk')
                ->pluck('total', 'kategori_produk')->all();
            // Filter berdasarkan pilihan
            switch ($filter) {
                case 'Hari Ini':
                    $produkDitawarkan = Produk::whereDate('created_at', today())->get();
                    break;
                case 'Minggu Ini':
                    $produkDitawarkan = Produk::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->get();
                    break;
                case 'Bulan Ini':
                    $produkDitawarkan = Produk::whereMonth('created_at', now()->month)->get();
                    break;
                default:
                    $produkDitawarkan = Produk::all(); // Menampilkan semua data jika tidak ada filter yang dipilih
                    break;
            }
        } elseif ($user->hasRole(['masyarakat', 'kelompok_tani'])) {
            // Jika pengguna adalah masyarakat atau kelompok tani, hitung produk yang ditambahkan oleh pengguna
            $totalProduk = Produk::where('id_user', Auth::user()->id_user)->count();
            $totalBerita = Berita::where('id_user', Auth::user()->id_user)->count();
            $berita = Berita::where('id_user', Auth::user()->id_user)->get();
            // Filter berdasarkan pilihan
            switch ($filter) {
                case 'Hari Ini':
                    $produkDitawarkan = Produk::where('id_user', Auth::user()->id_user)
                        ->whereDate('created_at', today())
                        ->get();
                    break;
                case 'Minggu Ini':
                    $produkDitawarkan = Produk::where('id_user', Auth::user()->id_user)
                        ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                        ->get();
                    break;
                case 'Bulan Ini':
                default:
                    $produkDitawarkan = Produk::where('id_user', Auth::user()->id_user)
                        ->get();
                    break;
            }
        }

        return view('dashboard', compact(['totalProduk', 'totalBerita', 'pengguna', 'berita', 'produkPerKecamatan', 'produkDitawarkan', 'filter', 'produkPerKategori']));
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
            $query->role(['admin', 'masyarakat', 'kelompok_tani']);
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

    public function hapusAkun($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }

        // Hapus foto profil jika ada
        if ($user->foto_user && file_exists(public_path('Foto Profil User/' . $user->foto_user))) {
            unlink(public_path('Foto Profil User/' . $user->foto_user));
        }

        // Hapus foto produk jika ada
        $produks = $user->produks;
        if ($produks) {
            foreach ($produks as $produk) {
                if ($produk->gambar1_produk && file_exists(public_path('Produk/' . $produk->gambar1_produk))) {
                    unlink(public_path('Produk/' . $produk->gambar1_produk));
                }
                if ($produk->gambar2_produk && file_exists(public_path('Produk/' . $produk->gambar2_produk))) {
                    unlink(public_path('Produk/' . $produk->gambar2_produk));
                }
                if ($produk->gambar3_produk && file_exists(public_path('Produk/' . $produk->gambar3_produk))) {
                    unlink(public_path('Produk/' . $produk->gambar3_produk));
                }
                $produk->delete();
            }
        }

        // Hapus foto Kabar Tani jika ada
        foreach ($user->kabarTani as $berita) {
            if ($berita->foto_berita && file_exists(public_path('Kabar Tani/' . $berita->foto_berita))) {
                unlink(public_path('Kabar Tani/' . $berita->foto_berita));
            }
            $berita->delete();
        }

        // Hapus pengguna dari database
        $user->delete();

        // Logout pengguna
        Auth::logout();

        return redirect()->route('login')->with('success', 'Akun Berhasil dihapus');
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

    public function lengkapiProfil(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'maps_user' => 'required|string|max:255',
            'foto_user' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user->nama_user = $request->nama;
        $user->alamat_user = $request->alamat;
        $user->kecamatan_user = $request->kecamatan;
        $user->notelp_user = $request->no_telp;
        $user->maps_user = $request->maps_user;

        if ($request->hasFile('foto_user')) {
            $foto = $request->file('foto_user');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'Foto Profil User';
            $foto->move(public_path($tujuan_upload), $nama_foto);
            $user->foto_user = $nama_foto;
        }

        if ($request->has('npwp') && auth()->user()->hasRole('kelompok_tani')) {
            $request->validate([
                'npwp' => 'required|string|max:20|unique:users,npwp,' . $user->id_user . ',id_user',
            ]);
            $user->npwp = $request->npwp;
        }

        $user->save();

        return redirect()->route('dashboardadmin')->with('success', 'Profil Anda berhasil diperbarui.');
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
            'maps_user' => 'nullable|string|max:255',
            'instagram_user' => 'nullable|string|max:255',
            'facebook_user' => 'nullable|string|max:255',
            'link_user' => 'nullable|string|max:255',
        ]);

        $user->nama_user = $request->nama;
        $user->alamat_user = $request->alamat;
        $user->kecamatan_user = $request->kecamatan;
        $user->notelp_user = $request->no_telp;
        $user->maps_user = $request->maps_user;
        $user->instagram_user = $request->instagram_user;
        $user->facebook_user = $request->facebook_user;
        $user->link_user = $request->link_user;
        // Validasi NPWP hanya untuk kelompok_tani
        if ($user->hasRole('kelompok_tani')) {
            $request->validate([
                'npwp' => 'required|string|max:20|unique:users,npwp,' . $user->id_user . ',id_user',
            ]);

            $user->npwp = $request->npwp;
        }

        if ($request->hasFile('foto_user')) {
            $foto = $request->file('foto_user');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'Foto Profil User';

            // Hapus foto lama jika ada
            if ($user->foto_user && file_exists(public_path($tujuan_upload . '/' . $user->foto_user))) {
                unlink(public_path($tujuan_upload . '/' . $user->foto_user));
            }

            $foto->move(public_path($tujuan_upload), $nama_foto);
            $user->foto_user = $nama_foto;
        }

        $user->save();

        return back()->with('success', 'Profil Anda berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required',
            'newpassword' => [
                'required',
                'min:8',
                'max:16',
                'regex:/^\S*$/u', // Tidak boleh mengandung spasi
                'confirmed'
            ],
            'newpassword_confirmation' => 'required|same:newpassword'
        ], [
            'newpassword.min' => 'Password harus memiliki minimal 8 karakter.',
            'newpassword.regex' => 'Password tidak boleh mengandung spasi.',
            'newpassword.confirmed' => 'Konfirmasi password tidak sesuai.'
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        // Periksa apakah kata sandi lama sesuai
        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->withErrors(['password' => 'Kata sandi lama salah.'])->with('activeTab', 'change-password');
        }

        // Update kata sandi user
        $user->password = Hash::make($request->newpassword);
        $user->save();

        return redirect()->back()->with('success', 'Kata sandi berhasil diubah.')->with('activeTab', 'change-password');
    }
}
