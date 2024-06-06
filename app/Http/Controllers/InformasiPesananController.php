<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPesanan;
use App\Models\Pesanan;

class InformasiPesananController extends Controller
{
    public function index()
    {
        $pesanan = Pesanan::with('cartItem')->get();
        $total = $pesanan->sum(function($item) {
            return $item->jumlah * $item->cartItem->menu->harga;
        });

        return view('informasipesanan.index', compact('pesanan', 'total'));
    }

}
