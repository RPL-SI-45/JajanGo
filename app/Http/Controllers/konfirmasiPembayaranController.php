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
            'metodePembayaran' => 'required|string',
        ]);

        // Memindahkan file bukti pembayaran ke direktori yang diinginkan
        $buktiPembayaran = time() . '.' . $request->file('buktiPembayaran')->extension();
        $request->file('buktiPembayaran')->move(public_path('images'), $buktiPembayaran);

        // Assigning static values for idPesanan and totalPembayaran
        $idPesanan = 1;
        $totalPembayaran = 3000;

        // Getting the selected payment method
        $metodePembayaran = $request->input('metodePembayaran');

        // Saving the data to the database
        $pembayaran = new Pembayaran;
        $pembayaran->idPesanan = $idPesanan;
        $pembayaran->metodePembayaran = $metodePembayaran;
        $pembayaran->tanggalPembayaran = now();
        $pembayaran->totalPembayaran = $totalPembayaran;
        $pembayaran->gambarBuktiPembayaran = $buktiPembayaran;
        $pembayaran->save();

        return redirect()->route('pembayaran.konfirmasiPembayaranCash')->with('success', 'Pembayaran berhasil dilakukan!');
    }

    public function konfirmasiPembayaranCash()
    {
        return view('pembayaran.konfirmasiPembayaranCash');
    }
}
