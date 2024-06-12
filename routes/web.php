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
use App\Http\Controllers\ProfilPedagangController;
use App\Http\Controllers\AuthController;
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

// Route::get('/', [DaftarpedagangController::class, 'index']);
// Route::get('/daftarpedagang', [DaftarpedagangController::class, 'index']);

// // Kelola daftar menu (pedagang)
// Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
// Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
// Route::post('/c/store', [daftarmenuController::class, 'store'])->name('menu.store');
// Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
// Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
// Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');

// //detail pesanan(user)
// Route::get('/detailpesanan', [PesananController::class, 'index'])->name('detailpesanan.index');

// // Tambahkan rute untuk rekomendasi menu
// Route::post('/menu/{id}/recommend', [daftarmenuController::class, 'recommend'])->name('menu.recommend');

// // Detail pesanan (user)
// Route::get('/detailpesanan', function(){
//     return view('detailpesanan.index');
// });

// // Pembayaran (user)
// Route::get('/pembayaran', function(){
//     return view('pembayaran.index');
// });
// Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
// Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
// Route::get('/konfirmasiPembayaranCash', function(){
//     return view('pembayaran.konfirmasiPembayaranCash');
// });

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

//pembayaran(user)
// Route::get('/pesanan',[PesananController::class,'index']);

// //profil pedagang
// Route::get('/profilpedagang', [ProfilPedagangController::class, 'show'])->name('profilpedagang.index');
// Route::put('/profilpedagang/{id}/update', [ProfilPedagangController::class, 'update'])->name('profilpedagang.update');

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
    Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.index');
    Route::get('/pedagang/daftarmenu/create', [daftarmenuController::class, 'create'])->name('menu.create');
    Route::post('/c/store', [daftarmenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{id}/edit', [daftarmenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{id}', [daftarmenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{id}', [daftarmenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('/informasipesanan',[InformasiPesananController::class,'index'])->name('pesanan.index');
    Route::get('/lacakpesanan/lacakpesananPedagang', [LacakpesananPedagangController::class, 'index'])->name('lacakpesananPedagang');
    Route::put('/lacakpesanan/updateStatus', [LacakpesananPedagangController::class, 'updateStatus'])->name('lacakpesanan.updateStatus');
    // Route::get('/profilpedagang', [ProfilPedagangController::class, 'show'])->name('profilpedagang.index');
    // Route::put('/profilpedagang/{id}/update', [ProfilPedagangController::class, 'update'])->name('profilpedagang.update');
    Route::get('/pedagang/{id}', [ProfilPedagangController::class, 'show'])->name('pedagang.show');
    Route::get('/pedagang/{id}/edit', [ProfilPedagangController::class, 'edit'])->name('pedagang.edit');
    Route::put('/pedagang/{id}', [ProfilPedagangController::class, 'update'])->name('pedagang.update');
});

// Rute untuk pembeli
Route::middleware(['role:pembeli'])->group(function () {
    Route::get('/home', [DaftarpedagangController::class, 'index']);
    Route::get('/detailpesanan', [PesananController::class, 'index'])->name('detailpesanan.index');
    Route::get('/pembayaran', function(){
        return view('pembayaran.index');
    });
    Route::get('/konfirmasipembayaran', [konfirmasiPembayaranController::class, 'index']);
    Route::post('/konfirmasipembayaran/store', [konfirmasiPembayaranController::class, 'store'])->name('pembayaran.store');
    Route::get('/konfirmasiPembayaranCash', function(){
        return view('pembayaran.konfirmasiPembayaranCash');
    });
    Route::get('/menu', [daftarmenuController::class, 'menuuser'])->name('menuuser.index');
    Route::get('/lacakpesanan/lacakpesananUser', [LacakpesananUserController::class, 'index']);
    Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/update', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/transfer-to-pesanan', [CartController::class, 'transferToPesanan'])->name('transfer-to-pesanan');
    // Route::get('/rekomendasi-makanan', [RekomendasiMakananController::class, 'index'])->name('rekomendasiMakanan.index');
    // Route::post('/rekomendasi-makanan', [RekomendasiMakananController::class, 'store'])->name('rekomendasiMakanan.store');
    Route::get('/rekomendasi-makanan', [daftarmenuController::class, 'recommend'])->name('rekomendasiMakanan.index');
    Route::post('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'toggleRecommendation'])->name('menu.toggleRecommendation');
    Route::delete('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'removeRecommendation'])->name('menu.removeRecommendation');
});
//menu(user)
Route::get('/menu',[daftarmenuController::class,'menuuser']);
// Route::get('/menu',[menuuserController::class,'index']);
// Menu (user)
Route::get('/menu', [daftarmenuController::class, 'menuuser'])->name('menuuser.index');

// Rekomendasi makanan
// Route::get('/rekomendasi-makanan', [daftarmenuController::class, 'recommend'])->name('rekomendasiMakanan.index');
// Route::post('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'toggleRecommendation'])->name('menu.toggleRecommendation');
// Route::delete('/menu/{id}/toggle-recommendation', [daftarmenuController::class, 'removeRecommendation'])->name('menu.removeRecommendation');

// Daftar Promo
Route::get('/diskon/daftarpromo', [DaftarDiskonController::class, 'showpromo'])->name('promo.index');

//kupon diskon(pedagang)
Route::get('/diskon/create', [DiskonController::class, 'index'])->name('index.coupons.create');
Route::post('/diskon/create/perform', [DiskonController::class, 'create'])->name('coupons.create.perform');

//daftar diskon
Route::get('/inputdiskon/daftardiskon', [DaftarDiskonController::class, 'index'])->name('daftardiskon.index');
Route::post('/inputdiskon1/daftardiskon', [DaftarDiskonController::class, 'store'])->name('daftardiskon.store');
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
// Route::get('/rekomendasi-makanan', [RekomendasiMakananController::class, 'index'])->name('rekomendasiMakanan.index');
// Route::post('/rekomendasi-makanan', [RekomendasiMakananController::class, 'store'])->name('rekomendasiMakanan.store');

//informasi pesanan (pedagang)
// Route::get('/',[InformasiPesananController::class,'index']);
Route::get('/informasipesanan',[InformasiPesananController::class,'index']);

//TESTING UNTUK PEMBAYARAN BARU
Route::get('/checkout', [PembayaranController::class, 'showCheckout'])->name('checkout');
Route::post('/payment/cash', [PembayaranController::class, 'payCash'])->name('payment.cash');
Route::get('/payment/confirmation', [PembayaranController::class, 'showCashConfirmation'])->name('payment.cash.confirmation');
Route::get('/payment/upload', [PembayaranController::class, 'showUploadForm'])->name('payment.upload');
Route::post('/payment/upload', [PembayaranController::class, 'uploadProof'])->name('payment.upload.submit');
Route::get('/diskon/daftardiskon', [DaftarDiskonController::class, 'index'])->name('daftardiskon.index');
Route::get('/diskon/daftardiskon1', [DaftarDiskonController::class, 'store'])->name('daftardiskon.store');
Route::delete('/diskon/hapusdaftardiskon/{id}', [DaftarDiskonController::class, 'destroy'])->name('daftardiskon.delete');
Route::get('/diskon/{id}/edit', [DaftarDiskonController::class, 'edit'])->name('daftardiskon.edit');
Route::put('/diskon/{id}/perform', [DaftarDiskonController::class, 'update'])->name('daftardiskon.perform');
