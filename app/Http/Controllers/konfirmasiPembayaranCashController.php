<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class konfirmasiPembayaranCashController extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::all();
        return view('pembayaran.konfirmasiPembayaranCash', ['pembayaran' => $pembayaran]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'idPembayaran' => 'required',
            'idPesanan' => 'required|numeric',
            'metodePembayaran' => 'required',
            'tanggalPembayaran' => 'required',
            'totalPembayaran' => 'required',
            'gambarBuktiPembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarBuktiPembayaran = time() . '.' . $request->gambarBuktiPembayaran->extension();
        $request->gambarBuktiPembayaran->move(public_path('images'), $gambarBuktiPembayaran);

        $pembayaran = new Pembayaran;
        $pembayaran->idPembayaran = $request->idPembayaran;
        $pembayaran->idPesanan = $request->idPesanan;
        $pembayaran->metodePembayaran = $request->metodePembayaran;
        $pembayaran->tanggalPembayaran = $request->tanggalPembayaran;
        $pembayaran->totalPembayaran = $request->totalPembayaran;
        $pembayaran->gambarBuktiPembayaran = $gambarBuktiPembayaran;
        $pembayaran->save();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan!');
    }
}
