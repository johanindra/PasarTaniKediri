<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class OtpController extends Controller
{
    public function sendOtp(Request $request)
    {
        $email = $request->input('email_user');

        // Cek apakah email terdaftar
        $user = User::where('email_user', $email)->first();

        if ($user) {
            // Generate OTP
            $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            try {
                // Kirim OTP melalui email
                Mail::to($email)->send(new OtpMail($otp));

                // Simpan OTP dan email dalam session
                session(['otp' => $otp, 'email' => $email]);

                return redirect()->route('verifikasi-otp');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'Gagal mengirim OTP, coba lagi.');
            }
        } else {
            return redirect()->route('verifikasi-email')->with('error', 'Email tidak terdaftar');
        }
    }


    public function verifyOtp(Request $request)
    {
        $otpArray = $request->input('otp');
        $otp = implode('', $otpArray); // Menggabungkan array menjadi string

        // Ambil OTP dan email dari session
        $storedOTP = session('otp');
        $email = session('email');

        // Debugging
        logger()->info('Received OTP:', ['otp' => $otp]);
        logger()->info('Stored OTP:', ['otp' => $storedOTP]);

        if ($otp === $storedOTP) {
            return view('Auth.lupa-sandi', compact('email'));
        } else {
            return redirect()->route('verifikasi-otp')->with('error', 'OTP salah, coba lagi.');
        }
    }


    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|min:6',
            'password_confirmation' => 'required|same:new_password',
        ]);

        $email = $request->input('email');

        $user = User::where('email_user', $email)->first();

        if (!$user) {
            return redirect()->route('verifikasi-email')->with('error', 'Email tidak terdaftar');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();


        session()->forget('otp');
        session()->forget('email');

        return redirect()->route('login')->with('success', 'Password berhasil diubah. Silakan masuk dengan password baru Anda.');
    }

    public function checkEmail(Request $request)
    {
        $email = $request->input('email_user');

        // Cek apakah email terdaftar
        $user = User::where('email_user', $email)->first();

        if ($user) {
            // Generate OTP
            $otp = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

            try {
                // Kirim OTP melalui email
                Mail::to($email)->send(new OtpMail($otp));
                return response()->json(['message' => 'otp terkirim', 'otp' => $otp], 200);
            } catch (\Exception $e) {
                return response()->json(['message' => 'Gagal mengirim OTP, coba lagi.'], 500);
            }
        } else {
            return response()->json(['message' => 'Email tidak terdaftar'], 400);
        }
    }
}
