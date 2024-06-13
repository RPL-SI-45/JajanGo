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
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\DaftarDiskonController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\RekomendasiMakananController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilPedagangController;
use App\Http\Controllers\LacakpesananUserController;
use App\Http\Controllers\LacakpesananPedagangController;

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

// Landing
Route::get('/', function(){
    return view('landing');
});

Route::get('/konfirmasiPembayaranCash', function(){
    return view('pembayaran.konfirmasiPembayaranCash');
});

// Route untuk pengguna
Route::get('login/user', [AuthController::class, 'showUserLoginForm'])->name('user.login');
Route::post('login/user', [AuthController::class, 'userLogin']);
Route::get('register/user', [AuthController::class, 'showUserRegisterForm'])->name('user.register');
Route::post('register/user', [AuthController::class, 'userRegister']);

// Route untuk pedagang
Route::get('login/pedagang', [AuthController::class, 'showPedagangLoginForm'])->name('pedagang.login');
Route::post('login/pedagang', [AuthController::class, 'pedagangLogin']);
Route::get('register/pedagang', [AuthController::class, 'showPedagangRegisterForm'])->name('pedagang.register');
Route::post('register/pedagang', [AuthController::class, 'pedagangRegister']);

Route::post('/logoutuser', function () {
    Auth::logout();
    return redirect('/login/user'); // atau arahkan ke halaman login yang sesuai
})->name('logoutuser');

Route::post('/logoutpedagang', function () {
    Auth::logout();
    return redirect('/login/pedagang'); // atau arahkan ke halaman login yang sesuai
})->name('logoutpedagang');

// Rute untuk pedagang
Route::middleware(['role:pedagang'])->group(function () {
    // kelola daftar menu
    Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
    Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
    Route::post('/c/store', [daftarmenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

    // informasipesanan
    Route::get('/informasipesanan',[InformasiPesananController::class,'index'])->name('pesanan.index');

    // ubah status lacak pesanan
    Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'index'])->name('lacakpesananPedagang');
    Route::put('/lacakpesanan/updateStatus', [LacakpesananPedagangController::class, 'updateStatus'])->name('lacakpesanan.updateStatus');

    // Profil pedagang
    Route::get('/pedagang/{id}', [ProfilPedagangController::class, 'show'])->name('pedagang.show');
    Route::get('/pedagang/{id}/edit', [ProfilPedagangController::class, 'edit'])->name('pedagang.edit');
    Route::put('/pedagang/{id}', [ProfilPedagangController::class, 'update'])->name('pedagang.update');

    //informasi pesanan (pedagang)
    Route::get('/informasipesanan',[InformasiPesananController::class,'index']);

    //kupon diskon(pedagang)
    Route::get('/diskon/daftardiskon', [DaftarDiskonController::class, 'index'])->name('daftardiskon.index');
    Route::get('/diskon/create', [DiskonController::class, 'index'])->name('index.coupons.create');
    Route::post('/diskon/create/perform', [DiskonController::class, 'create'])->name('coupons.create.perform');
    Route::get('/diskon/{id}/edit', [DaftarDiskonController::class, 'edit'])->name('daftardiskon.edit');
    Route::put('/diskon/{id}/perform', [DaftarDiskonController::class, 'update'])->name('daftardiskon.perform');
    Route::get('/diskon/daftardiskon1', [DaftarDiskonController::class, 'store'])->name('daftardiskon.store');
    Route::delete('/diskon/hapusdaftardiskon/{id}', [DaftarDiskonController::class, 'destroy'])->name('daftardiskon.delete');

    // rekomendasi makanan
    Route::post('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'toggleRecommendation'])->name('menu.toggleRecommendation');
    Route::delete('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'removeRecommendation'])->name('menu.removeRecommendation');
});

// Rute untuk pembeli
Route::middleware(['role:pembeli'])->group(function () {

    // home user (menampilkan list pedagang)
    Route::get('/home', [DaftarpedagangController::class, 'index']);

    //detailpesanan
    Route::get('/detailpesanan', [PesananController::class, 'index'])->name('detailpesanan.index');

    // pembayaran
    Route::get('/pembayaran', function(){
        return view('pembayaran.index');
    });
    Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
    Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/konfirmasiPembayaranCash', function(){
        return view('pembayaran.konfirmasiPembayaranCash');
    });

    // melihat menu dari pedagang
    Route::get('/menu', [daftarmenuController::class, 'menuuser'])->name('menuuser.index');

    // lacak pesanan
    Route::get('/lacakpesanan/lacakpesananUser', [LacakpesananUserController::class, 'index']);

    // cart
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/transfer-to-pesanan', [CartController::class, 'transferToPesanan'])->name('transfer-to-pesanan');


    // rekomendasi makanan
    Route::get('/rekomendasi-makanan', [daftarmenuController::class, 'recommend'])->name('rekomendasiMakanan.index');


    // Daftar Promo
    Route::get('/diskon/daftarpromo', [DaftarDiskonController::class, 'showpromo'])->name('promo.index');

    // riwayat pesanan pedagang
    Route::get('/riwayatpesanan', [riwayatPesananController::class, 'index'])->name('riwayatPesanan.index');

    //TESTING UNTUK PEMBAYARAN BARU
    Route::get('/checkout', [PembayaranController::class, 'showCheckout'])->name('checkout');
    Route::post('/payment/cash', [PembayaranController::class, 'payCash'])->name('payment.cash');
    Route::get('/payment/confirmation', [PembayaranController::class, 'showCashConfirmation'])->name('payment.cash.confirmation');
    Route::get('/payment/upload', [PembayaranController::class, 'showUploadForm'])->name('payment.upload');
    Route::post('/payment/upload', [PembayaranController::class, 'uploadProof'])->name('payment.upload.submit');
});




