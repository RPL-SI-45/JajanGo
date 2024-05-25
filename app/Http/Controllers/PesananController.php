<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;

class PesananController extends Controller
{
    public function index(){
        $pesanan = Pesanan::all();
        return view('detailpesanan.index', ['pesanan' => $pesanan]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_menu' => 'required',
            'jumlah' => 'required|numeric',
            'catatan' => 'required',
            'tanggal_pesanan' => 'required',
            'harga' => 'required|numeric',
        ]);
        
        Pesanan::create([
            'nama_menu' => $request->nama_menu,
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'tanggal_pesanan' => $request->tanggal_pesanan,
            'harga' => $request->harga,
        ]);

        return redirect()->route('detailpesanan.index')->with('success', 'Pesanan berhasil!');
    }
}
