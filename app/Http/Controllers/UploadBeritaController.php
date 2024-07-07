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

    public function hapus($id_user)
    {
        $berita = Berita::find($id_user);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }

        if (file_exists(public_path('Kabar Tani/' . $berita->foto_berita))) {
            unlink(public_path('Kabar Tani/' . $berita->foto_berita));
        }

        $berita->delete();

        return redirect()->back()->with('success', 'Berita Berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'judul_berita' => 'required',
            'tanggal_berita' => 'required',
            'foto_berita' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi_berita' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $berita = Berita::find($id);
        if (!$berita) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }

        $berita->judul_berita = $request->judul_berita;
        $berita->tanggal_berita = $request->tanggal_berita;
        $berita->deskripsi_berita = $request->deskripsi_berita;

        if ($request->hasFile('foto_berita')) {
            $foto = $request->file('foto_berita');
            $nama_foto = time() . "_" . $foto->getClientOriginalName();
            $tujuan_upload = 'Kabar Tani';
            $foto->move($tujuan_upload, $nama_foto);

            // Menghapus foto lama jika ada
            if ($berita->foto_berita && file_exists(public_path($tujuan_upload . '/' . $berita->foto_berita))) {
                unlink(public_path($tujuan_upload . '/' . $berita->foto_berita));
            }

            $berita->foto_berita = $nama_foto;
        }

        try {
            $berita->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal memperbarui berita. Silakan coba lagi.');
        }

        return redirect()->back()->with('success', 'Berita berhasil diperbarui.');
    }
}
