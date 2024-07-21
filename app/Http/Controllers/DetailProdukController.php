<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
// use App\Models\Komentar; // Pastikan Anda mengimpor model Komentar di sini

class DetailProdukController extends Controller
{
    public function index(Request $request)
    {
        $id_produk = $request->id_produk;
        $produk = Produk::findOrFail($id_produk); 
        $produk = Produk::where('id_produk', $id_produk)->get();

        return view('landing.detailproduk', compact('produk'));

    }

    public function show($id_produk)
    {
        $produk = Produk::findOrFail($id_produk); // Mengambil data produk berdasarkan ID
        $produk = Produk::where('id_produk', $id_produk)->get();

        return view('landing.detailproduk', compact('produk'));
    }

    public function storeComment(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        // Simpan komentar ke dalam database
        Komentar::create([
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
            'id_produk' => $request->id_produk,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }
}
