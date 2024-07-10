<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
}
