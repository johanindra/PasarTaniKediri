<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;


class ArtikelController extends Controller
{
    //
    public function index()
    {
        
        
    // return view('landing.artikel');
    // $berita = Berita::orderBy('id_berita', 'asc')->cursorPaginate(6);

        $berita = Berita::orderBy('id_berita', 'asc')->get();
        return view('landing.artikel', compact('berita'));
        
    }
    public function show($id_berita)
{
    $berita = Berita::findOrFail($id_berita);
    return view('landing.detailartikel', compact('berita'));
}

}
