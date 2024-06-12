<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Pembayaran;
use App\Models\DaftarMenu;

class PembayaranController extends Controller
{
    public function showCheckout()
    {
        // Misalkan user_id diset secara hardcoded untuk demonstrasi
        $userId = 1;
        $cartItems = CartItem::with('menu')->get();
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->menu->harga;
        });

        return view('pembayaran.checkout', compact('cartItems','total'));
    }

    public function payCash()
    {
        // Redirect ke halaman konfirmasi pembayaran tunai
        return redirect()->route('payment.cash.confirmation');
    }

    public function showCashConfirmation()
    {
        return view('pembayaran.konfirmasiPembayaranCash');
    }

    public function showUploadForm()
    {
        return view('pembayaran.konfirmasiPembayaran');
    }

    public function uploadProof(Request $request)
    {
        $request->validate([
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $fileName = time().'.'.$request->proof->extension();
        $request->proof->move(public_path('proofs'), $fileName);

        // Simpan informasi bukti pembayaran di database jika diperlukan
        // PaymentProof::create(['user_id' => 1, 'file_name' => $fileName]); // Hardcoded user_id untuk demonstrasi

        return redirect()->route('checkout')->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
}
