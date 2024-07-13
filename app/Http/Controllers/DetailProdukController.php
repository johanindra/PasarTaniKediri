<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\Produk;


class DetailProdukController extends Controller
{
    
    public function index(Request $request)
{
    $id_produk = $request->id_produk; // Mengambil id_berita dari parameter URL
    $produk = Produk::where('id_produk', $id_produk)->get();

    // $berita = Berita::findOrFail($id_berita); // Mengambil berita berdasarkan id_berita
    return view('landing.detailproduk', compact('produk'));
}




public function show($id_produk)
{
    // Mengambil data produk berdasarkan ID
    $produk = Produk::findOrFail($id_produk);

    // Mengirim data produk ke view 'landing.detailproduk'
    return view('landing.detailproduk', compact('produk'));
}

}
