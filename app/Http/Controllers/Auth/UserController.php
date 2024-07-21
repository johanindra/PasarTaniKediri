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

    public function login(Request $request)
    {
        $credentials = $request->only('email_user', 'password');
        $user = User::where('email_user', $request->email_user)->first();

        if (!$user) {
            // Email tidak ditemukan
            return redirect()->back()->withInput()->with('error', 'Pengguna tidak terdaftar');
        }

        if (!Auth::attempt($credentials)) {
            // Password salah
            return redirect()->back()->withInput()->with('error', 'Password salah');
        }

        // Jika berhasil login
        if (empty($user->alamat_user) || empty($user->kecamatan_user) || empty($user->notelp_user)) {
            return redirect()->route('lengkapi-profil');
        }

        return redirect()->route('dashboardadmin');
    }

    // Login lama
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email_user', 'password');

    //     if (Auth::attempt($credentials)) {
    //         $user = Auth::user();
    //         if (empty($user->alamat_user) || empty($user->kecamatan_user) || empty($user->notelp_user)) {
    //             return redirect()->route('lengkapi-profil');
    //         }
    //         return redirect()->route('dashboardadmin');
    //     }

    //     return redirect()->route('login')->with('error', 'Username atau Password anda salah');
    // }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function Daftar()
    {
        return view('Auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/', // Nama hanya boleh mengandung huruf, angka, dan spasi
                'regex:/^(?!.*\s$).+$/', // Nama tidak boleh mengandung spasi di akhir
            ],
            'email_user' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email_user',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/^\S*$/', // Password tidak boleh mengandung spasi
                'confirmed'
            ],
        ], [
            //nama
            'nama_user.required' => 'Nama Lengkap tidak boleh kosong.',
            'nama_user.regex' => 'Nama tidak boleh mengandung spasi di akhir.',
            'nama_user.min' => 'Nama tidak boleh kurang dari 2 karakter.',
            'nama_user.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'nama_user.regex' => 'Nama tidak boleh menggunakan Karakter spesial.',
            //email
            'email_user.required' => 'Email tidak boleh kosong.',
            'email_user.email' => 'Email harus menggunakan @gmail.com.',
            'email_user.unique' => 'Email sudah terdaftar, silakan gunakan email yang lain.',
            //password
            'password.min' => 'Password tidak boleh kurang dari 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 16 karakter.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.regex' => 'Password tidak boleh mengandung spasi.',
            'password.confirmed' => 'Password dan konfirmasi password tidak sama.',
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
        ])->AssignRole('masyarakat');


        if ($user) {
            return redirect()->route('daftar')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
        }
    }

    public function DaftarTani()
    {
        return view('Auth.register-kelompok-tani');
    }

    public function registerKelompok(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => [
                'required',
                'string',
                'min:2',
                'max:100',
                'regex:/^[a-zA-Z0-9\s]+$/', // Nama hanya boleh mengandung huruf, angka, dan spasi
                'regex:/^(?!.*\s$).+$/', // Nama tidak boleh mengandung spasi di akhir
            ],
            'email_user' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email_user',
            ],
            'npwp' => [
                'required',
                'string',
                'man:15',
                'max:16',
                'regex:/^\d+$/', // NPWP hanya boleh mengandung angka
                'unique:users,npwp',
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'max:16',
                'regex:/^\S*$/', // Password tidak boleh mengandung spasi
                'confirmed',
            ],
        ], [
            //nama
            'nama_user.required' => 'Nama Lengkap tidak boleh kosong.',
            'nama_user.min' => 'Nama tidak boleh kurang dari 2 karakter.',
            'nama_user.max' => 'Nama tidak boleh lebih dari 100 karakter.',
            'nama_user.regex' => 'Nama tidak boleh menggunakan Karakter spesial.',
            'nama_user.regex' => 'Nama tidak boleh mengandung spasi di akhir.',
            //email
            'email_user.email' => 'Email harus menggunakan @gmail.com.',
            'email_user.required' => 'Email tidak boleh kosong',
            'email_user.unique' => 'Email sudah terdaftar, silakan gunakan email yang lain.',
            //npwp
            'npwp.required' => 'NPWP tidak boleh kosong.',
            'npwp.regex' => 'NPWP hanya boleh mengandung angka.',
            'npwp.min' => 'NPWP tidak boleh kurang dari 15 digit angka.',
            'npwp.max' => 'NPWP tidak boleh lebih dari 16 digit angka.',
            'npwp.unique' => 'NPWP sudah terdaftar.',
            //password
            'password.min' => 'Password tidak boleh kurang dari 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 16 karakter.',
            'password.required' => 'Password tidak boleh kosong.',
            'password.regex' => 'Password tidak boleh mengandung spasi.',
            'password.confirmed' => 'Password dan konfirmasi password tidak sama.',
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
            'npwp' => $request->npwp,
        ])->AssignRole('kelompok_tani');


        if ($user) {
            return redirect()->route('daftar-tani')->with('success', 'Registrasi berhasil. Silakan login.');
        } else {
            return redirect()->back()->with('error', 'Gagal melakukan registrasi.');
        }
    }

    public function tambahAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_user' => ['required', 'string', 'max:100', 'min:2', 'regex:/^[a-zA-Z0-9\s]+$/'],
            'email_user' => 'required|string|email|max:255|unique:users,email_user',
            'password' => ['required', 'string', 'min:8', 'max:16', 'regex:/^\S*$/'],
        ], [
            // nama
            'nama_user.required' => 'Nama Lengkap tidak boleh kosong.',
            'nama_user.max' => 'Nama Lengkap tidak boleh lebih dari 100 karakter.',
            'nama_user.min' => 'Nama Lengkap tidak boleh kurang dari 2 karakter.',
            'nama_user.regex' => 'Nama hanya boleh mengandung huruf, angka, dan spasi.',
            //email
            'email_user.required' => 'Email tidak boleh kosong.',
            'email_user.email' => 'Email harus menggunakan @gmail.com.',
            'email_user.unique' => 'Email sudah terdaftar. silakan gunakan email yang lain.',
            //password
            'password.required' => 'Password tidak boleh kosonh.',
            'password.min' => 'Password tidak boleh kurang dari 8 karakter.',
            'password.max' => 'Password tidak boleh lebih dari 16 karakter.',
            'password.regex' => 'Password tidak boleh mengandung spasi.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('modal_open', true);  // Tambahkan parameter ini
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
        ]);

        $user->assignRole('admin');

        if ($user) {
            return redirect()->route('adminpengguna')->with('success', 'Admin berhasil ditambahkan.');
        } else {
            return redirect()->back()->with('error', 'Gagal menambahkan admin.');
        }
    }
}
