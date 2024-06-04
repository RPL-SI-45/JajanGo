<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RekomendasiMakanan;

class RekomendasiMakananController extends Controller
{
    public function index()
    {
        $rekomendasiMakanan = RekomendasiMakanan::all();
        return view('rekomendasiMakanan.index', compact('rekomendasiMakanan'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaToko' => 'required',
            'namaMakanan' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();  
            $request->gambar->move(public_path('images'), $imageName);
        }

        RekomendasiMakanan::create([
            'namaToko' => $validatedData['namaToko'],
            'namaMakanan' => $validatedData['namaMakanan'],
            'harga' => $validatedData['harga'],
            'gambar' => $imageName,
        ]);
    }
}
