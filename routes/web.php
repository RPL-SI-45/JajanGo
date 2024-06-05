<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\AboutController;
use App\Http\Controllers\DaftarpedagangController;
use App\Http\Controllers\daftarmenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\konfirmasiPembayaranController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\menuuserController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\DaftarDiskonController;
=======
>>>>>>> 82e8271 (Framework)

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
<<<<<<< HEAD
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
Route::get('/detailpesanan', [PesananController::class, 'index'])->name('detailpesanan.index');

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
Route::get('/menu',[menuuserController::class,'index']);

//kupon diskon(pedagang)
Route::get('/inputdiskon/create', [DiskonController::class, 'index'])->name('coupons.create');
Route::post('/inputdiskon/daftardiskon', [DiskonController::class, 'create'])->name('coupons.create');

//daftar diskon
Route::get('/inputdiskon/daftardiskon', [DaftarDiskonController::class, 'index'])->name('daftardiskon.index');
Route::post('/inputdiskon1/daftardiskon', [DaftarDiskonController::class, 'store'])->name('daftardiskon.store');
=======

Route::get('/', function () {
    return view('welcome');
});

Route::get('/coba', function(){
    return view('coba');
});
>>>>>>> 82e8271 (Framework)
