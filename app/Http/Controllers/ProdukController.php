<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Pastikan untuk mengimpor model Produk

class ProdukController extends Controller
{
    
public function index(Request $request)
{
    // Mulai query produk
    $produk = Produk::query(); 

    // Filter berdasarkan pencarian
    if ($request->get('search')) {
        $produk->where('nama_produk', 'LIKE', '%' . $request->get('search') . '%');
    }

    // Filter berdasarkan kecamatan
    if ($request->get('kecamatan')) {
        $kecamatan = $request->get('kecamatan');
        $produk->whereHas('user', function ($query) use ($kecamatan) {
            $query->where('alamat_user', 'LIKE', '%' . $kecamatan . '%');
        });
    }

    // Filter berdasarkan kategori
    if ($request->get('kategori_produk')) {
        $category = $request->get('kategori_produk');
        $produk->where('kategori_produk', $category);
    }

    // Ambil hasil query
    $produk = $produk->get();

    // Kirim data produk dan kategori ke view
    return view('landing.produk', compact('produk'));
}
}
