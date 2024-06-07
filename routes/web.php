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
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\DaftarDiskonController;

Route::get('/', [DaftarpedagangController::class, 'index']);
Route::get('/daftarpedagang', [DaftarpedagangController::class, 'index']);

// Kelola daftar menu (pedagang)
Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
Route::post('/c/store', [daftarmenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

// //menu(user)
// Route::get('/menu', [daftarmenuController::class, 'menuuser'])->name('menuuser.index');
// // Route::get('/menu',[daftarmenuController::class,'menuuser']);
// // Route::get('/menu',[menuuserController::class,'index']);

// //lacakPesanan
// Route::get('/lacakpesanan/lacakpesananUser', [LacakpesananUserController::class, 'index']);
// Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'index'])->name('lacakpesananPedagang');
// Route::put('/lacakpesanan/updateStatus', [LacakpesananPedagangController::class, 'updateStatus'])->name('lacakpesanan.updateStatus');
// // Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'lacakpesananPedagang'])->name('lacakpesananPedagang');

// //keranjang

// Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
// Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
// Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
// Route::post('/transfer-to-pesanan', [CartController::class, 'transferToPesanan'])->name('transfer-to-pesanan');

// // Rekomendasi makanan
// Route::get('/rekomendasi-makanan', [RekomendasiMakananController::class, 'index'])->name('rekomendasiMakanan.index');
// Route::post('/rekomendasi-makanan', [RekomendasiMakananController::class, 'store'])->name('rekomendasiMakanan.store');

// //informasi pesanan (pedagang)
// // Route::get('/',[InformasiPesananController::class,'index']);
// // Route::get('/informasipesanan',[InformasiPesananController::class,'index']);
// Route::get('/informasipesanan',[InformasiPesananController::class,'index'])->name('pesanan.index');

// // Rekomendasi makanan
// Route::get('/rekomendasi-makanan', [daftarmenuController::class, 'recommend'])->name('rekomendasiMakanan.index');
// Route::post('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'toggleRecommendation'])->name('menu.toggleRecommendation');
// Route::delete('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'removeRecommendation'])->name('menu.removeRecommendation');

// Pembayaran (user)
Route::get('/pembayaran', function(){
    return view('pembayaran.index');
});
Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
Route::get('/konfirmasiPembayaranCash', function(){
    return view('pembayaran.konfirmasiPembayaranCash');
});

// Menu (user)
Route::get('/menu', [daftarmenuController::class, 'menuuser'])->name('menuuser.index');

// Rekomendasi makanan
Route::get('/rekomendasi-makanan', [daftarmenuController::class, 'recommend'])->name('rekomendasiMakanan.index');
Route::post('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'toggleRecommendation'])->name('menu.toggleRecommendation');
Route::delete('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'removeRecommendation'])->name('menu.removeRecommendation');

// Daftar Promo
Route::get('/diskon/daftarpromo', [DaftarDiskonController::class, 'showpromo'])->name('promo.index');

//kupon diskon(pedagang)
Route::get('/diskon/create', [DiskonController::class, 'index'])->name('index.coupons.create');
Route::post('/diskon/create/perform', [DiskonController::class, 'create'])->name('coupons.create.perform');

//daftar diskon
Route::get('/diskon/daftardiskon', [DaftarDiskonController::class, 'index'])->name('daftardiskon.index');
Route::get('/diskon/daftardiskon1', [DaftarDiskonController::class, 'store'])->name('daftardiskon.store');
Route::delete('/diskon/hapusdaftardiskon/{id}', [DaftarDiskonController::class, 'destroy'])->name('daftardiskon.delete');
Route::get('/diskon/{id}/edit', [DaftarDiskonController::class, 'edit'])->name('daftardiskon.edit');
Route::put('/diskon/{id}/perform', [DaftarDiskonController::class, 'update'])->name('daftardiskon.perform');
