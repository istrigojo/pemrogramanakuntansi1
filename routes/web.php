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
use App\Http\Controllers\Backend\KategoriesController;
use App\Http\Controllers\Backend\ServisController;
use App\Http\Controllers\Backend\BeritaController;

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('backend/akun', AkunController::class);
Route::resource('backend/customer', CustomerController::class);
Route::resource('backend/user', UserController::class);
Route::resource('backend/mobil', MobilController::class);
Route::resource('backend/produk', ProdukController::class);
Route::resource('backend/montir', MontirController::class);
// Route::match(['get', 'post'], 'backend/getIdUser/{id}', 'MontirController@getIdUser');

Route::get('backend/montir/getIdUser/{id}', [MontirController::class, 'getIdUser']);
// Route::get('backend/montir/getIdUser/{id}', [MontirController::class, 'getIdUser'])->name('backend/getIdUser');
Route::resource('backend/bagkategori', BagkategoriController::class);
Route::resource('backend/kategori', KategoriController::class);
Route::resource('backend/kategories', KategoriesController::class);
Route::resource('backend/servis', ServisController::class);
Route::resource('backend/berita', BeritaController::class);
