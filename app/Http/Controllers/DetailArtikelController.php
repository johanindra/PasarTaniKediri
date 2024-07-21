<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;


class DetailArtikelController extends Controller
{
    
public function index(Request $request)
{
    $id_berita = $request->id_berita; // Mengambil id_berita dari parameter URL
    $berita = Berita::where('id_berita', $id_berita)->get();

    // $berita = Berita::findOrFail($id_berita); // Mengambil berita berdasarkan id_berita
    return view('landing.detailartikel', compact('berita'));
}

    
    public function show($id_berita)
    {
        $berita = Berita::findOrFail($id_berita);
        $berita = Berita::where('id_berita', $id_berita)->get();
        // $berita = Berita::get();
        // $berita = Berita::where('id_berita', '!=', $id_berita)->get();
        $berita_lain = Berita::where('id_berita', '!=', $id_berita)->get();



        return view('landing.detailartikel', compact('berita', 'berita_lain'));
    }
    
    
    
}
