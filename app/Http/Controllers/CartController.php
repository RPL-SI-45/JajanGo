<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\DaftarMenu;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'menu_id' => 'required|exists:menu,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = CartItem::updateOrCreate(
            ['menu_id' => $request->menu_id],
            ['quantity' => \DB::raw('quantity + ' . $request->quantity)]
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
}
