<?php

use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SidebarController;
use App\Http\Controllers\UploadBeritaController;
use App\Http\Controllers\UploadProdukController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard');
});

// Route::get('/', function () {
//     return view('lengkapi-profil');
// });
Route::get('/', function () {
    return view('Auth.login');
})->middleware('auth.redirect');

Route::get('login', [SidebarController::class, 'login'])->name('login')->middleware('auth.redirect');

// Route::get('masuk', [UserController::class, 'masuk'])->name('masuk')->middleware('auth.redirect');
Route::post('login', [UserController::class, 'login']);

Route::get('daftar', [UserController::class, 'Daftar'])->name('daftar')->middleware('auth.redirect');
Route::get('daftar-tani', [UserController::class, 'DaftarTani'])->name('daftar-tani')->middleware('auth.redirect');
Route::post('register', [UserController::class, 'register'])->name('register.post');
Route::post('register-tani', [UserController::class, 'registerKelompok'])->name('registerkelompok.post');

Route::post('keluar', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth.admin', 'check.profile'])->group(function () {
    Route::get('dashboard', [SidebarController::class, 'dashboard'])->name('dashboardadmin')->middleware(['role:admin|kelompok_tani|masyarakat']);
    Route::get('produk-tani', [SidebarController::class, 'produk'])->name('produktani')->middleware(['role:admin|kelompok_tani|masyarakat']);
    Route::get('kabar-tani', [SidebarController::class, 'berita'])->name('adminberita')->middleware(['role:admin|kelompok_tani']);
    Route::get('data-pengguna', [SidebarController::class, 'pengguna'])->name('adminpengguna')->middleware(['role:admin']);
    Route::get('profil', [SidebarController::class, 'profil'])->name('adminprofil')->middleware(['role:admin|kelompok_tani|masyarakat']);
    Route::get('/detail-berita/{id}', [SidebarController::class, 'detailBerita'])->name('detail.kabar')->middleware(['role:admin|kelompok_tani']);
    Route::get('/detail-produk/{id}', [SidebarController::class, 'detailProduk'])->name('produk.detail');
});

Route::middleware(['auth.admin', 'ProfilCompletion'])->get('lengkapi-profil', [SidebarController::class, 'lengkapi'])->name('lengkapi-profil');
Route::middleware(['auth.admin', 'ProfilCompletion'])->post('lengkapi-profil', [SidebarController::class, 'lengkapiProfil'])->name('lengkapi-profil');

Route::middleware('auth.admin')->group(function () {
    Route::post('/upload/berita', [UploadBeritaController::class, 'Upload'])->name('uploadBerita');
    Route::post('/upload/produk', [UploadProdukController::class, 'Uploadproduk'])->name('uploadproduk');
    Route::post('/update/profil', [SidebarController::class, 'updateProfil'])->name('update-profil');

    // berita
    Route::get('/upload/hapus/{id}', [UploadBeritaController::class, 'hapus'])->name('upload.hapus');
    Route::put('/berita/update/{id}', [UploadBeritaController::class, 'update'])->name('updateBerita');

    //produk
    Route::get('/produk/hapus/{id_produk}', [UploadProdukController::class, 'hapus'])->name('produk.hapus');
    Route::put('/produk/update/{id}', [UploadProdukController::class, 'updateProduk'])->name('updateProduk');

    //profil
    Route::delete('/profil/hapus/{id_user}', [SidebarController::class, 'hapusAkun'])->name('hapus-akun');

    Route::get('/detail-pengguna/{id}', [SidebarController::class, 'detailpengguna'])->name('detail.pengguna')->middleware(['role:admin']);
});
