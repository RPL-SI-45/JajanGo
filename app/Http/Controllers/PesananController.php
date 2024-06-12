<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\CartItem;

class PesananController extends Controller
{
    public function index(){
        // Mengambil semua CartItem beserta relasi dengan DaftarMenu
        $pesanan = CartItem::with('menu')->get();
    
        // Membuat array untuk menyimpan hasil
        $result = array();
    
        // Menginisialisasi grandTotal
        $grandTotal = 0;
    
        // Loop melalui setiap item dalam pesanan
        foreach ($pesanan as $item) {
            // Menambahkan data yang diperlukan ke dalam array
            $result[] = [
                'namaMenu' => $item->menu->namaMenu,
                'harga' => $item->menu->harga, // Asumsi 'harga' adalah nama properti untuk harga dalam model DaftarMenu
                'quantity' => $item->quantity // Mengambil quantity dari CartItem
            ];
    
            // Menghitung total harga untuk setiap item
            $totalHargaItem = $item->menu->harga * $item->quantity;
    
            // Menambahkan total harga item ke grandTotal
            $grandTotal += $totalHargaItem;
        }
    
        // Periksa hasil dengan dd (optional)
    
        // Mengirim data ke view bersama dengan grandTotal
        return view('detailpesanan.index', ['pesanan' => $pesanan, 'grandTotal' => $grandTotal]);
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
