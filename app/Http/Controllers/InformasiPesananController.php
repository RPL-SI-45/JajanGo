<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPesanan;
use App\Models\Pesanan;

class InformasiPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('informasipesanan.index', compact('pesanan'));
    }
}
