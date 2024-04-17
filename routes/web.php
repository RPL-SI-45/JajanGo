<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesananController;

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

Route::get('/detailpesanan', function(){
    return view('detailpesanan.index');
});

Route::get('/pesanan',[PesananController::class,'index']);
