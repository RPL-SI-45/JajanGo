<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPesanan;
use App\Models\Pesanan;

class InformasiPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('nama_menu')->get();
        $total = $pesanan->sum(function($jumlah) {
            return $jumlah->jumlah * $jumlah->menu->harga;
        });

        return view('informasipesanan.index', compact('pesanan', 'total'));
    }

}