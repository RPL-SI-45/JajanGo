<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\DaftarMenu;
use App\Models\Pesanan;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'quantity' => 'required|integer|min:1'
        ]);

        // Ambil informasi menu dari database
        $menu = DaftarMenu::findOrFail($request->menu_id);

        // Hitung harga item berdasarkan harga menu
        $price = $menu->harga;

        // Hitung total harga untuk item ini (misalnya, harga x jumlah)
        $total = $price * $request->quantity;

        // Tambahkan atau update item ke keranjang belanja
        $cartItem = CartItem::updateOrCreate(
            ['menu_id' => $request->menu_id],
            ['quantity' => \DB::raw('quantity + ' . $request->quantity),
             'price' => $price,
             'total' => \DB::raw('total + ' . $total)]
        );

        return redirect()->back()->with('success', 'Menu added to cart!');
    }

    public function viewCart()
    {
        $cartItems = CartItem::with('menu')->get();
        $total = $cartItems->sum(function($item) {
            return $item->quantity * $item->menu->harga;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::find($request->cart_item_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->save();

        return redirect()->route('cart.index')->with('success', 'Keranjang berhasil diperbarui!');
    }

    public function removeFromCart(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id'
        ]);

        $cartItem = CartItem::find($request->cart_item_id);
        $cartItem->delete();

        return redirect()->route('cart.index')->with('success', 'Item berhasil dihapus dari keranjang!');
    }

    public function transferToPesanan()
    {
        $cartItems = CartItem::all();

        foreach ($cartItems as $cartItem) {
            $menu = DaftarMenu::find($cartItem->menu_id);

            if ($menu) {
                Pesanan::create([
                    'namaMenu' => $menu->namaMenu,
                    'quantity' => $cartItem->quantity,
                ]);
            }
        }

        return redirect()->back()->with('success', 'Menu added to cart!');
    }

    public function addToCartFromPromo(Request $request)
    {
        $request->validate([
            'promo_id' => 'required|exists:daftar_promos,id'
        ]);

        // Dapatkan daftar menu dari promo
        $promo = DaftarPromo::findOrFail($request->promo_id);
        $daftarMenu = $promo->daftarMenu()->get();

        // Tambahkan setiap menu dari promo ke keranjang
        foreach ($daftarMenu as $menu) {
            // Tambahkan atau update item ke keranjang belanja
            $cartItem = CartItem::updateOrCreate(
                ['menu_id' => $menu->id],
                ['quantity' => \DB::raw('quantity + 1'), // Tambah 1 item untuk setiap menu
                 'price' => $menu->harga,
                 'total' => \DB::raw('total + ' . $menu->harga)]
            );
        }

        return redirect()->route('cart.index')->with('success', 'Items from promo added to cart!');
    }
}
