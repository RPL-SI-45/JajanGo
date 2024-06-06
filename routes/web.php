<?php

use App\Http\Controllers\InformasiPesanan;
use App\Http\Controllers\InformasiPesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarpedagangController;
use App\Http\Controllers\daftarmenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\konfirmasiPembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\menuuserController;
use App\Http\Controllers\riwayatPesananController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RekomendasiMakananController;
use App\Http\Controllers\LacakpesananPedagangController;
use App\Http\Controllers\LacakpesananUserController;


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
//home
Route::get('/', [DaftarpedagangController::class, 'index']);
Route::get('/daftarpedagang', [DaftarpedagangController::class, 'index']);

// Kelola daftar menu (pedagang)
Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
Route::post('/pedagang/daftarmenu/store', [daftarmenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

//detail pesanan(user)
Route::get('/detailpesanan', [PesananController::class, 'index'])->name('detailpesanan.index');


// Pembayaran (user)
Route::get('/pembayaran', function(){
    return view('pembayaran.index');
});
Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/konfirmasiPembayaranCash', function(){
    return view('pembayaran.konfirmasiPembayaranCash');
});

//menu(user)
Route::get('/menu',[daftarmenuController::class,'menuuser']);
// Route::get('/menu',[menuuserController::class,'index']);

//lacakPesanan
Route::get('/lacakpesanan/lacakpesananUser', [LacakpesananUserController::class, 'index']);
Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'index'])->name('lacakpesananPedagang');
Route::put('/lacakpesanan/updateStatus', [LacakpesananPedagangController::class, 'updateStatus'])->name('lacakpesanan.updateStatus');
// Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'lacakpesananPedagang'])->name('lacakpesananPedagang');

//keranjang

Route::get('/riwayatPesanan', [riwayatPesananController::class, 'index'])->name('riwayatPesanan.index');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Rekomendasi makanan
Route::get('/rekomendasi-makanan', [RekomendasiMakananController::class, 'index'])->name('rekomendasiMakanan.index');
Route::post('/rekomendasi-makanan', [RekomendasiMakananController::class, 'store'])->name('rekomendasiMakanan.store');

//informasi pesanan (pedagang)
// Route::get('/',[InformasiPesananController::class,'index']);
Route::get('/informasipesanan',[InformasiPesananController::class,'index']);

//TESTING UNTUK PEMBAYARAN BARU
Route::get('/checkout', [PembayaranController::class, 'showCheckout'])->name('checkout');
Route::post('/payment/cash', [PembayaranController::class, 'payCash'])->name('payment.cash');
Route::get('/payment/confirmation', [PembayaranController::class, 'showCashConfirmation'])->name('payment.cash.confirmation');
Route::get('/payment/upload', [PembayaranController::class, 'showUploadForm'])->name('payment.upload');
Route::post('/payment/upload', [PembayaranController::class, 'uploadProof'])->name('payment.upload.submit');
