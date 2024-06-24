<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');



Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {

    Route::get('/master', [HomeController::class, 'master'])->name('master');
    Route::get('/order', [HomeController::class, 'order'])->name('order');
    Route::get('/daerah', [HomeController::class, 'order'])->name('');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('detail');
    Route::get('/pesanan', [HomeController::class, 'pesanan'])->name('pesanan');
    Route::get('/show-all', [HomeController::class, 'showAll'])->name('show-all');
    Route::post('/barang-masuk', [HomeController::class, 'barang_masuk'])->name('barang-masuk');

    Route::get('/Keluar', [HomeController::class, 'keluar'])->name('Keluar');
    Route::post('/Out', [HomeController::class, 'Out'])->name('Out');

    Route::put('/update-status/{id}', [HomeController::class, 'update_status'])->name('update-status');

    Route::get('/create', [HomeController::class, 'create'])->name('Create');
    Route::post('/store', [HomeController::class, 'store'])->name('Barang-Baru');

    Route::get('/Masuk', [HomeController::class, 'masuk'])->name('Masuk');
    Route::get('/stok-baru', [HomeController::class, 'stok_baru'])->name('stok-baru');

    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('update');

    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
});

