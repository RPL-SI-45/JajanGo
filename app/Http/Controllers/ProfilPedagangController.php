<?php

namespace App\Http\Controllers;

use App\Models\ProfilPedagang;
use Illuminate\Http\Request;
use App\Models\User;

class ProfilPedagangController extends Controller
{
    public function index()
    {
        $profilpedagang = ProfilPedagang::paginate(10);
        return view('profilpedagang.index', compact('profilpedagang'));
    }

    public function create()
    {
        return view('profilpedagang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaToko' => 'required',
            'alamatToko' => 'required',
            'deskripsiToko' => 'required',
            'gambarToko' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $gambarToko = time() . '.' . $request->gambarToko->extension();
        $request->gambarToko->move(public_path('gambar'), $gambarToko);

        ProfilPedagang::create([
            'namaToko' => $request->namaToko,
            'alamatToko' => $request->alamatToko,
            'deskripsiToko' => $request->deskripsiToko,
            'gambarToko' => $gambarToko,
        ]);

        return redirect()->route('profilpedagang.index')
            ->with('success', 'Profil Pedagang telah dibuat.');
    }

    public function show()
    {
        $profilpedagang = ProfilPedagang::where('namaToko', 'abc')->first();
        return view('profilpedagang.index', ['profilpedagang' => $profilpedagang]);
    }
    

    public function edit($id)
    {
        $profilpedagang = ProfilPedagang::find($id);
        return view('profilpedagang.edit', compact('profilpedagang'));
    }

    public function update(Request $request, $id)
    {
        $attributes= $request->validate([
            'namaToko' => 'required',
            'alamatToko' => 'required',
            'deskripsiToko' => 'required',
            'gambarToko' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $profilpedagang = ProfilPedagang::find($id);
        $gambarToko = $profilpedagang->gambarToko;

        if ($request->hasFile('gambarToko')) {
            $gambarToko = time() . '.' . $request->gambarToko->extension();
            $request->gambarToko->move(public_path('gambar'), $gambarToko);
        }

        $profilpedagang->update([
            'namaToko' => $attributes['namaToko'],
            'alamatToko' => $attributes['alamatToko'],
            'deskripsiToko' => $attributes['deskripsiToko'],
            'gambarToko' => $gambarToko,
        ]);

        return redirect()->route('profilpedagang.index')
            ->with('success', 'Profil Pedagang telah diubah.');
    }
}
