<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\MerekController;
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


Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginProses']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'registerStore']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/merek/cetak-merek');
Route::resource('/merek', MerekController::class)->except(['show']);
Route::resource('/produk', ProdukController::class);

//banner====================================================================
Route::get('/banner/{angka}', [BannerController::class, 'index']);
Route::get('/banner/create/{angka}', [BannerController::class, 'create']);
Route::post('/banner/{angka}', [BannerController::class, 'store']);
Route::get('/banner/{id}/edit/{angka}', [BannerController::class, 'edit']);
//==========================================================================
