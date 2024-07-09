<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function masuk()
    {
        return view('Auth.login');
    }

    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email_user', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboardadmin');
    //     }

    //     return redirect()->route('login')->with('error', 'Username atau Password anda salah');
    // }

    public function login(Request $request)
    {
        $credentials = $request->only('email_user', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if (empty($user->alamat_user) || empty($user->kecamatan_user) || empty($user->notelp_user)) {
                return redirect()->route('lengkapi-profil');
            }
            return redirect()->route('dashboardadmin');
        }

        return redirect()->route('login')->with('error', 'Username atau Password anda salah');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email_user' => 'required|email',
    //         'password' => 'required',
    //     ]);

    //     $credentials = $request->only('email_user', 'password');

    //     if (Auth::attempt($credentials)) {
    //         return redirect()->route('dashboardadmin');
    //     }

    //     return redirect()->back()->withInput($request->only('email_user'))->withErrors([
    //         'email_user' => 'Email atau password salah.',
    //     ]);
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function Daftar()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => 'required|string|max:255',
            'email_user' => 'required|string|email|max:255|unique:users,email_user',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'nama_user' => $request->nama_user,
            'email_user' => $request->email_user,
            'password' => Hash::make($request->password),
            'alamat_user' => null,
            'kecamatan_user' => null,
            'notelp_user' => null,
            'foto_user' => null,
            'maps_user' => null,
            'instagram_user' => null,
            'facebook_user' => null,
            'link_user' => null,
        ])->AssignRole('kelompok_tani');


        if ($user) {
            return redirect()->route('daftar')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
        }
    }
}
