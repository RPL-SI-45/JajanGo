<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();
        return view('detailpesanan.index', ['pembayaran' => $pembayaran]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id',
            'nama_menu' => 'required',
            'jumlah' => 'required',
            'catatan' => 'required|numeric',
            'tanggal_pesanan' => 'required',
            'harga' => 'required',
        ]);
        
        pesanan::create([
            'id',
            'nama_menu' => $request -> nama_menu,
            'jumlah' => $request -> jumlah,
            'catatan' => $request -> catatan,
            'tanggal_pesanan' => $request -> tanggal_pesanan,
            'harga' => $request -> harga,
        ]);

        return redirect()->route('detailpesanan.index')->with('success', 'Pesanan berhasil!');
    }
}