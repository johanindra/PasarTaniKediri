<?php

use App\Http\Controllers\SidebarController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard');
});

Route::get('dashboard', [SidebarController::class, 'dashboard'])->name('dashboardadmin');
Route::get('produk', [SidebarController::class, 'produk'])->name('adminproduk');
Route::get('kabar-tani', [SidebarController::class, 'berita'])->name('adminberita');
Route::get('data-pengguna', [SidebarController::class, 'pengguna'])->name('adminpengguna');
Route::post('keluar', [SidebarController::class, 'keluar'])->name('logout');
