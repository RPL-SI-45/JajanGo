<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\daftarmenuController;

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

//kelola daftar menu
Route::get('/pedagang/daftarmenu', [daftarmenuController::class, 'index'])->name('menu.create');
Route::post('/pedagang/daftarmenu/store', [daftarmenuController::class, 'store'])->name('menu.store');

