<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InformasiPesanan;
use App\Models\CartItem;

class InformasiPesananController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('menu')->get();
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->menu->harga;
        });

        return view('informasipesanan.index', compact('cartItems', 'total'));
    }

}