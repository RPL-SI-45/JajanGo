<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class konfirmasiPembayaranController extends Controller
{
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pembayaran.konfirmasiPembayaran', ['pembayaran' => $pembayaran]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'buktiPembayaran' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $buktiPembayaran = time() . '.' . $request->file('buktiPembayaran')->extension();
        $request->file('buktiPembayaran')->move(public_path('images'), $buktiPembayaran);
        $pembayaran = new Pembayaran;
        $pembayaran->tanggalPembayaran = now(); // Isi dengan nilai tanggal pembayaran yang sesuai dengan logika bisnis
        $pembayaran->save();





        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran berhasil dilakukan!');
    }
}

