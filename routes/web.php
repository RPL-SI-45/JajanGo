<?php

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