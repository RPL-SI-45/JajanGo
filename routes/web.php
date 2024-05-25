<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarpedagangController;
use App\Http\Controllers\daftarmenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\konfirmasiPembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\menuuserController;
use App\Http\Controllers\CartController;

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
// Route::get('/', function () {
//     return view('daftarmenu.index');
// });
//home(user)
Route::get('/',[DaftarpedagangController::class,'index']);
Route::get('/daftarpedagang',[DaftarpedagangController::class,'index']);

//kelola daftar menu(pedagang)
Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
Route::post('/pedagang/daftarmenu/store', [daftarmenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

//detail pesanan(user)
Route::get('/detailpesanan', function(){
    return view('detailpesanan.index');
});

//pembayaran(user)
// Route::get('/pesanan',[PesananController::class,'index']);
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

//keranjang

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
