<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMenu;
use App\Models\Pedagang;

class DaftarmenuController extends Controller
{
    public function index(){
        $daftarmenu = DaftarMenu::all();
        $pedagang = Pedagang::all();
        return view('daftarmenu.index', compact('daftarmenu', 'pedagang'));
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
            $daftarmenu->gambarMenu = $gambarMenuName;
        }

        $daftarmenu->save();

        return redirect()->route('menu.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy($id){
        $daftarmenu = DaftarMenu::findOrFail($id);
        $daftarmenu->delete();
        return redirect()->route('menu.index')->with('success', 'Menu berhasil dihapus!');
    }

    public function menuuser(){
        $daftarmenu = DaftarMenu::all();
        return view('menuuser.index', compact('daftarmenu'));
    }

    public function recommend()
    {
        // $menu = DaftarMenu::findOrFail($id);
        // $menu->is_recommended = true;
        // $menu->save();

        // return redirect()->route('menu.index')->with('success', 'Menu berhasil ditandai sebagai rekomendasi.');
        $recommendedMenus = DaftarMenu::where('is_recommended', true)->get();

        return view('rekomendasimakanan.index', ['recommendedMenus' => $recommendedMenus]);

    }

    public function toggleRecommendation($id)
    {
    $menu = DaftarMenu::find($id);
    $menu->is_recommended = !$menu->is_recommended;
    $menu->save();

    return redirect()->back()->with('success', 'Recommendation status updated successfully');
    }

    public function removeRecommendation($id)
    {
    $menu = DaftarMenu::find($id);
    $menu->is_recommended = false;
    $menu->save();

    return redirect()->back()->with('success', 'Menu removed from recommendations');
    }

}
