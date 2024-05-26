<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarpedagangController;
use App\Http\Controllers\daftarmenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\konfirmasiPembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\menuuserController;
use App\Http\Controllers\RekomendasiMakananController;

Route::get('/', [DaftarpedagangController::class, 'index']);
Route::get('/daftarpedagang', [DaftarpedagangController::class, 'index']);

// Kelola daftar menu (pedagang)
Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
Route::post('/c/store', [daftarmenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

// Tambahkan rute untuk rekomendasi menu
Route::post('/menu/{id}/recommend', [daftarmenuController::class, 'recommend'])->name('menu.recommend');

// Detail pesanan (user)
Route::get('/detailpesanan', function(){
    return view('detailpesanan.index');
});

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

