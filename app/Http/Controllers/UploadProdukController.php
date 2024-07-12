<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadProdukController extends Controller
{
    public function show()
    {
        $produk = Produk::where('id_user', Auth::user()->id_user)->get();
        return view('produk', ['produk' => $produk]);
    }
    public function uploadProduk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'kategori_produk' => 'required',
            'deskripsi_produk' => 'required',
            'gambar1_produk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'gambar2_produk' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'gambar3_produk' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $gambar1 = $request->file('gambar1_produk');
        $nama_gambar1 = time() . "_" . $gambar1->getClientOriginalName();
        $gambar1->move('Produk', $nama_gambar1);

        $nama_gambar2 = null;
        if ($request->hasFile('gambar2_produk')) {
            $gambar2 = $request->file('gambar2_produk');
            $nama_gambar2 = time() . "_" . $gambar2->getClientOriginalName();
            $gambar2->move('Produk', $nama_gambar2);
        }

        $nama_gambar3 = null;
        if ($request->hasFile('gambar3_produk')) {
            $gambar3 = $request->file('gambar3_produk');
            $nama_gambar3 = time() . "_" . $gambar3->getClientOriginalName();
            $gambar3->move('Produk', $nama_gambar3);
        }

        $id_user = auth()->id();

        try {
            Produk::create([
                'nama_produk' => $request->nama_produk,
                'harga_produk' => $request->harga_produk,
                'kategori_produk' => $request->kategori_produk,
                'deskripsi_produk' => $request->deskripsi_produk,
                'gambar1_produk' => $nama_gambar1,
                'gambar2_produk' => $nama_gambar2,
                'gambar3_produk' => $nama_gambar3,
                'id_user' => $id_user,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan produk. Silakan coba lagi.');
        }

        return response()->json(['success' => true]);
    }

    public function hapus($id_produk)
    {
        $produk = Produk::find($id_produk);
        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        if (file_exists(public_path('Produk/' . $produk->gambar1_produk))) {
            unlink(public_path('Produk/' . $produk->gambar1_produk));
        }
        if ($produk->gambar2_produk && file_exists(public_path('Produk/' . $produk->gambar2_produk))) {
            unlink(public_path('Produk/' . $produk->gambar2_produk));
        }
        if ($produk->gambar3_produk && file_exists(public_path('Produk/' . $produk->gambar3_produk))) {
            unlink(public_path('Produk/' . $produk->gambar3_produk));
        }

        $produk->delete();

        return redirect()->back()->with('success', 'Produk berhasil dihapus');
    }

    public function updateProduk(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required',
            'harga_produk' => 'required|numeric',
            'kategori_produk' => 'required',
            'deskripsi_produk' => 'required',
            'gambar1_produk' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'gambar2_produk' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'gambar3_produk' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $produk = Produk::find($id);

        if (!$produk) {
            return redirect()->back()->with('error', 'Produk tidak ditemukan');
        }

        $produk->nama_produk = $request->nama_produk;
        $produk->harga_produk = $request->harga_produk;
        $produk->kategori_produk = $request->kategori_produk;
        $produk->deskripsi_produk = $request->deskripsi_produk;

        // Proses upload gambar 1
        if ($request->hasFile('gambar1_produk')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar1_produk) {
                $gambarPath = public_path('Produk/' . $produk->gambar1_produk);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
            $gambar1 = $request->file('gambar1_produk');
            $nama_gambar1 = time() . "_" . $gambar1->getClientOriginalName();
            $gambar1->move('Produk', $nama_gambar1);
            $produk->gambar1_produk = $nama_gambar1;
        }

        // Proses upload gambar 2
        if ($request->hasFile('gambar2_produk')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar2_produk) {
                $gambarPath = public_path('Produk/' . $produk->gambar2_produk);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
            $gambar2 = $request->file('gambar2_produk');
            $nama_gambar2 = time() . "_" . $gambar2->getClientOriginalName();
            $gambar2->move('Produk', $nama_gambar2);
            $produk->gambar2_produk = $nama_gambar2;
        } elseif ($request->input('hapus_gambar2') == '1') {
            // Hapus gambar kedua
            if ($produk->gambar2_produk) {
                $gambarPath = public_path('Produk/' . $produk->gambar2_produk);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                    $produk->gambar2_produk = null;
                }
            }
        }

        // Proses upload gambar 3
        if ($request->hasFile('gambar3_produk')) {
            // Hapus gambar lama jika ada
            if ($produk->gambar3_produk) {
                $gambarPath = public_path('Produk/' . $produk->gambar3_produk);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                }
            }
            $gambar3 = $request->file('gambar3_produk');
            $nama_gambar3 = time() . "_" . $gambar3->getClientOriginalName();
            $gambar3->move('Produk', $nama_gambar3);
            $produk->gambar3_produk = $nama_gambar3;
        } elseif ($request->input('hapus_gambar3') == '1') {
            // Hapus gambar ketiga
            if ($produk->gambar3_produk) {
                $gambarPath = public_path('Produk/' . $produk->gambar3_produk);
                if (file_exists($gambarPath)) {
                    unlink($gambarPath);
                    $produk->gambar3_produk = null;
                }
            }
        }

        try {
            $produk->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengupdate produk. Silakan coba lagi.');
        }

        return redirect()->back()->with('success', 'Produk berhasil diupdate');
    }
}
