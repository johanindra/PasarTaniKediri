<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\DetailProdukController;
use App\Http\Controllers\DetailArtikelController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\TentangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/landing', [LandingController::class, 'index'])->name('landing');
Route::post('/landing/contact', [LandingController::class, 'contact'])->name('landing.contact');

// Route::get('/detailproduk/{id_produk}', [DetailProdukController::class, 'show'])->name('produkshow');
Route::get('/detailproduk/{id_produk}', [DetailProdukController::class, 'show'])->name('detailproduk');
Route::post('/detailproduk/store-comment', [DetailProdukController::class, 'storeComment'])->name('storecomment');




// Route::get('/detailartikel/{id_berita}', [DetailArtikelController::class, 'show'])->name('artikelshow');
Route::get('/detailartikel/{id_berita}', [DetailArtikelController::class, 'show'])->name('detailartikel');


Route::get('/produk/admin', [ProdukController::class, 'index'])->name('produk');

Route::get('/artikel', [ArtikelController::class, 'index'])->name('artikel');

Route::get('/tentang', [TentangController::class, 'index'])->name('tentang');
Route::get('/produk/filter', [ProdukController::class, 'filter'])->name('produk.filter');

