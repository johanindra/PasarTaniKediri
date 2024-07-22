<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Komentar;

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
    // Mengambil data produk berdasarkan ID
    $produk = Produk::findOrFail($id_produk);
    $produk = Produk::where('id_produk', $id_produk)->get();


    // Mengambil komentar terkait produk
    $komentar = Komentar::where('id_produk', $id_produk)->get();

    // Menyimpan ID produk ke dalam session
    session(['current_produk_id' => $id_produk]);

    // Mengirim data produk dan komentar ke view
    return view('landing.detailproduk', compact('produk', 'komentar', 'id_produk'));
}


    public function create()
{
    return view('landing.detailproduk');
}

    

public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'komentar' => 'required|string',
        ]);

        // Ambil id_produk dari session
        $id_produk = $request->session()->get('current_produk_id');
        if (!$id_produk) {
            return redirect()->back()->withErrors('ID Produk tidak ditemukan.');
        }

        // Simpan komentar ke dalam database
        Komentar::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'komentar' => $request->komentar,
            'id_produk' => $id_produk, // Gunakan nilai id_produk dari session
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil disimpan.');
    }

}
