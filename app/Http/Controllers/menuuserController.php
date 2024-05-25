<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuUser;

class menuuserController extends Controller
{
    public function index()
    {
        $menuuser = MenuUser::all();
        return view('menuuser.index', compact('menuuser'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required|numeric',
            'deskripsiMenu' => 'required',
            'kategoriMenu' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = $request->gambar ? time().'.'.$request->gambar->extension() : 'dummy-image.png';
        
        if ($request->gambar) {
            $request->gambar->move(public_path('images'), $imageName);
        }

        $menuuser = new MenuUser([
            'namaMenu' => $validatedData['namaMenu'],
            'harga' => $validatedData['harga'],
            'deskripsiMenu' => $validatedData['deskripsiMenu'],
            'kategoriMenu' => $validatedData['kategoriMenu'],
            'gambar' => $imageName,
        ]);

        $menuuser->save();

        return redirect()->route('menuuser.index')
                        ->with('success', 'Menu berhasil ditambahkan');
    }
}
