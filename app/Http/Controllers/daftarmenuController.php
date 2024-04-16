<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMenu;

class daftarmenuController extends Controller
{
    public function index(){
        $daftarmenu = DaftarMenu::all();
        return view('daftarmenu.index', compact('daftarmenu'));
    }

    public function create(){
        return view('daftarmenu.tambahMenu');
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
    public function edit($id)
    {
        $daftarmenu = DaftarMenu::findOrFail($id);
        return view('daftarmenu.editMenu', compact('daftarmenu'));
    }
    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'namaMenu' => 'required',
            'harga' => 'required|numeric',
            'deskripsiMenu' => 'required',
            'kategoriMenu' => 'required',
            'gambarMenu' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $daftarmenu = DaftarMenu::findOrFail($id);
        $daftarmenu->namaMenu = $request->namaMenu;
        $daftarmenu->harga = $request->harga;
        $daftarmenu->deskripsiMenu = $request->deskripsiMenu;
        $daftarmenu->kategoriMenu = $request->kategoriMenu;

        if ($request->hasFile('gambarMenu')) {
            $gambarMenuName = time() . '.' . $request->gambarMenu->extension();
            $request->gambarMenu->move(public_path('images'), $gambarMenuName);
            $menu->gambarMenu = $gambarMenuName;
        }

        $daftarmenu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }
}
