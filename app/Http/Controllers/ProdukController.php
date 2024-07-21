<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; // Pastikan untuk mengimpor model Produk

class ProdukController extends Controller
{
    // public function index()
    // {
    //     $produk = Produk::all(); // Mengambil semua produk dari database
    //     if ($request->get('search')) {
    //         $tabungan->whereHas('produk', function ($query) use ($request) {
    //             $query->where('nama_produk', 'LIKE', '%' . $request->get('search') . '%');
    //         });
    //     }
        
    //     return view('landing.produk', compact('produk')); // Mengirimkan data produk ke view 'landing.produk'
    // }

//     public function index(Request $request)
// {
//     $produk = Produk::query(); // Memulai query untuk mengambil semua produk

//     // Jika ada parameter 'search' yang diterima dari form
//     if ($request->get('search')) {
//         $produk->where('nama_produk', 'LIKE', '%' . $request->get('search') . '%');
//     }
    

//     // Mengambil hasil query produk
//     $produk = $produk->get();

//     return view('landing.produk', compact('produk')); // Mengirimkan data produk ke view 'landing.produk'
// }
public function index(Request $request)
{
    $produk = Produk::query(); // Query untuk mengambil semua produk

    // Jika ada parameter 'search' yang diterima dari form
    if ($request->get('search')) {
        $produk->where('nama_produk', 'LIKE', '%' . $request->get('search') . '%');
    }

    // Jika ada parameter 'kecamatan' yang diterima dari form
    if ($request->get('kecamatan')) {
        $kecamatan = $request->get('kecamatan');

        // Memfilter produk berdasarkan kecamatan user
        $produk->whereHas('user', function ($query) use ($kecamatan) {
            $query->where('alamat_user', 'LIKE', '%' . $kecamatan . '%');
        });
    }

    // Mengambil hasil query produk
    $produk = $produk->get();

    return view('landing.produk', compact('produk')); // Mengirimkan data produk ke view 'landing.produk'
}

}
