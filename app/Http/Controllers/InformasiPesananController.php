<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPesanan;

class InformasiPesananController extends Controller
{
    public function index(){
        $informasipesanan = InformasiPesanan::all();
        return view(('informasipesanan'), compact('informasipesanan'));
    }
}
