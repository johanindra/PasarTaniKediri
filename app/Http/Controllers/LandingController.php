<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\LandingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Berita;
use App\Models\Produk;
use App\Mail\ContactMail;




class LandingController extends Controller
{
    //
    public function index()
{
    $berita = Berita::latest()->take(3)->get();
    
    $produk = Produk::all();
    
    return view('landing', compact('berita', 'produk'));
}
// public function contact(Request $request)
//     {
//         $request->validate([
//             'name' => 'required',
//             'email' => 'required|email',
//             'subject' => 'required',
//             'message' => 'required',
//         ]);

//         $details = [
//             'name' => $request->name,
//             'email' => $request->email,
//             'subject' => $request->subject,
//             'message' => $request->message,
//         ];

//         Mail::to('pasartanikediri@gmail.com')->send(new ContactMail($details));

//         return back()->with('message_sent', 'Pesanmu Berhasil di kirim, Terimakasih!');
//     }
public function contact(Request $request)
    {
        // Debugging: Dump and die to see request data
        // dd($request->all());

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        try {
            // Mengirim email ke admin
            Mail::to('pasartanikediri@gmail.com')->send(new ContactFormMail($validatedData));

            return redirect()->back()->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            // Debugging: Catch and log any error
            \Log::error('Mail sending error: '.$e->getMessage());
            return redirect()->back()->with('error', 'There was an error sending your message. Please try again later.');
        }
    }


}
