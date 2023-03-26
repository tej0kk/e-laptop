<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProses'])->name('login.proses');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerStore'])->name('register.store');

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){
    Route::resource('/merek', MerekController::class)->except(['show']);
    Route::resource('/produk', ProdukController::class);
    
    //banner====================================================================
    Route::get('/banner/{angka}', [BannerController::class, 'index']);
    Route::get('/banner/create/{angka}', [BannerController::class, 'create']);
    Route::post('/banner/{angka}', [BannerController::class, 'store']);
    Route::get('/banner/{id}/edit/{angka}', [BannerController::class, 'edit']);
    //==========================================================================
    
    //keranjang=================================================================
    Route::get('/keranjang', [KeranjangController::class, 'index']);
    //==========================================================================

    //pesanan===================================================================
    Route::get('/pesanan', [PesananController::class, 'index']);
    //==========================================================================

    Route::get('/logout', [AuthController::class, 'logout']);

});