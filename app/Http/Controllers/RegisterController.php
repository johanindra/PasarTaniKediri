<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users,email_user',
            'password_user' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create new user
        $user = User::create([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'password_user' => Hash::make($request->password_user),
            'alamat_user' => null,
            'kecamatan_user' => null,
            'notelp_user' => null,
            'foto_user' => null,
            'level_user' => 'admin',
            'maps_user' => null,
            'instagram_user' => null,
            'facebook_user' => null,
            'link_user' => null,
        ]);

        // SweetAlert2 success message and then redirect
        if ($user) {
            return redirect()->route('daftar')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
        }
    }
}
