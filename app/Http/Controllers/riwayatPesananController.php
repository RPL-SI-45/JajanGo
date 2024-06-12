<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class riwayatPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::all();
        return view('riwayatPesanan.index', compact('pesanan'));
    }
}
