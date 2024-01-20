<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\AkunController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProdukController;
use App\Http\Controllers\Backend\MontirController;
use App\Http\Controllers\Backend\MobilController;
use App\Http\Controllers\Backend\BagkategoriController;
use App\Http\Controllers\Backend\KategoriController;
use App\Http\Controllers\Backend\ServisController;
use App\Http\Controllers\Backend\TransaksiController;
use App\Http\Controllers\Backend\JurnalController;
use App\Http\Controllers\Backend\LaporanController;

use App\Http\Controllers\Backend\BeritaController;
use App\Http\Controllers\Backend\KategoriesController;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
// Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('backend/akun', AkunController::class);
Route::resource('backend/customer', CustomerController::class);
// Route::get('backend/customer', [CustomerController::class, 'index'])->name('index');
Route::resource('backend/user', UserController::class);
Route::resource('backend/mobil', MobilController::class);
Route::resource('backend/produk', ProdukController::class);
Route::resource('backend/montir', MontirController::class);
// Route::match(['get', 'post'], 'backend/getIdUser/{id}', 'MontirController@getIdUser');

Route::get('backend/montir/getIdUser/{id}', [MontirController::class, 'getIdUser']);
// Route::get('backend/montir/getIdUser/{id}', [MontirController::class, 'getIdUser'])->name('backend/getIdUser');
Route::resource('backend/bagkategori', BagkategoriController::class);
Route::resource('backend/kategori', KategoriController::class);
Route::resource('backend/servis', ServisController::class);
Route::resource('backend/transaksi', TransaksiController::class);
Route::resource('backend/jurnal', JurnalController::class);
Route::resource('backend/laporan', LaporanController::class);

Route::resource('backend/berita', BeritaController::class);
Route::resource('backend/kategories', KategoriesController::class);
