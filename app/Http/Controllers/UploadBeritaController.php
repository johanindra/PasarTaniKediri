<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UploadBeritaController extends Controller
{
    public function show()
    {
        $berita = Berita::get();
        return view('kabar-tani', ['berita' => $berita]);
    }

    public function Upload(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'tanggal_berita' => 'required',
            'foto_berita' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_berita' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $foto = $request->file('foto_berita');

        $nama_foto = time() . "_" . $foto->getClientOriginalName();

        $tujuan_upload = 'Kabar Tani';
        $foto->move($tujuan_upload, $nama_foto);

        // Menggunakan auth()->id() untuk mendapatkan id_user dari pengguna yang sedang login
        $id_user = auth()->id();

        try {
            $berita = Berita::create([
                'judul_berita' => $request->judul_berita,
                'tanggal_berita' => $request->tanggal_berita,
                'foto_berita' => $nama_foto,
                'deskripsi_berita' => $request->deskripsi_berita,
                'id_user' => $id_user,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan berita. Silakan coba lagi.');
        }

        return response()->json(['success' => true]);
    }
}
