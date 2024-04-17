<?php

use Illuminate\Support\Facades\Route;
use APP\Http\Controllers\AboutController;
use App\Http\Controllers\konfirmasiPembayaranController;
use App\Http\Controllers\PembayaranController;

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
    return view('welcome');
});

Route::get('/coba', function(){
    return view('coba');
});

Route::get('/pembayaran', function(){
    return view('pembayaran.index');
});
Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/konfirmasiPembayaranCash', function(){
    return view('pembayaran.konfirmasiPembayaranCash');
});
