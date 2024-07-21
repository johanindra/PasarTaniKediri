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
    public function index(Request $request)
{
    $berita = Berita::latest()->take(3)->get();
    // dd($category);

    // $produk = Produk::all();
    $category = $request->get('kategori_produk');
    
    if ($category) {
        $produk = Produk::where('kategori_produk', $category)->get();
    } else {
        $produk = Produk::all();
    }
    
    return view('landing', compact('berita','category', 'produk'));
}
// ProductController.php
// public function index(Request $request)
// {
//     $category = $request->get('category');
    
//     if ($category) {
//         $produk = Product::where('kategori', $category)->get();
//     } else {
//         $produk = Product::all();
//     }
    
//     return view('produk.index', compact('produk', 'category'));
// }

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
