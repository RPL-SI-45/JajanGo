<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class konfirmasiPembayaranController extends Controller
{
    public function index(){
        $pembayaran = Pembayaran::all();
        return view('pembayaran.konfirmasiPembayaran', ['pembayaran' => $pembayaran]);
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // 'idPembayaran' => 'required',
            // 'idPesanan' => 'required|numeric',
            // 'metodePembayaran' => 'required',
            // 'tanggalPembayaran' => 'required',
            // 'totalPembayaran' => 'required',
            'buktiPembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $buktiPembayaran = time() . '.' . $request->gambarBuktiPembayaran->extension();
        $request->gambarBuktiPembayaran->move(public_path('images'), $buktiPembayaran);

        $pembayaran = new Pembayaran;
        // $pembayaran->idPembayaran = $request->idPembayaran;
        // $pembayaran->idPesanan = $request->idPesanan;
        // $pembayaran->metodePembayaran = $request->metodePembayaran;
        // $pembayaran->tanggalPembayaran = $request->tanggalPembayaran;
        // $pembayaran->totalPembayaran = $request->totalPembayaran;
        $pembayaran->gambarBuktiPembayaran = $buktiPembayaran;
        $pembayaran->save();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan!');
    }
}
