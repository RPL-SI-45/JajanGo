<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InformasiPesanan extends Controller
{
    public function index(){
        $informasipesanan = InformasiPesanan::all();
        return view(('informasipesanan'), compact('informasipesanan'));
    }
}
