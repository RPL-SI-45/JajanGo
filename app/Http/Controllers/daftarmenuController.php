<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMenu;

class daftarmenuController extends Controller
{
    public function index(){
        $daftarmenu = DaftarMenu::all();
        return view('daftarmenu.index');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required|numeric',
            'deskripsiMenu' => 'required',
            'kategoriMenu' => 'required',
            'gambarMenu' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarMenuName = time() . '.' . $request->gambarMenu->extension();
        $request->gambarMenu->move(public_path('images'), $gambarMenuName);

        $menu = new DaftarMenu;
        $menu->namaMenu = $request->namaMenu;
        $menu->harga = $request->harga;
        $menu->deskripsiMenu = $request->deskripsiMenu;
        $menu->kategoriMenu = $request->kategoriMenu;
        $menu->gambarMenu = $gambarMenuName;
        $menu->save();

        return redirect()->route('menu.create')->with('success', 'Menu berhasil ditambahkan!');
    }
}
