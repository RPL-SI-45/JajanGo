<?php

namespace App\Http\Controllers;

use App\Models\ProfilPedagang;
use App\Models\Pedagang;
use Illuminate\Http\Request;
use App\Models\User;

class ProfilPedagangController extends Controller
{
    // Method untuk menampilkan profil pedagang
    public function show($id)
    {
        $pedagang = Pedagang::findOrFail($id);
        return view('profilpedagang.index', compact('pedagang'));
    }

    // Method untuk menampilkan form edit profil pedagang
    public function edit($id)
    {
        $pedagang = Pedagang::findOrFail($id);
        return view('profilpedagang.edit', compact('pedagang'));
    }

    // Method untuk menyimpan perubahan profil pedagang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'alamat_toko' => 'required|string|max:255',
            'no_telepon_pedagang' => 'required|string|max:255|unique:pedagang,no_telepon_pedagang,' . $id,
            'username_pedagang' => 'required|string|max:255|unique:pedagang,username_pedagang,' . $id,
            'password' => 'nullable|string|min:8|confirmed',
            'deskripsi_toko' => 'nullable|string',
        ]);

        $pedagang = Pedagang::findOrFail($id);
        $pedagang->nama_toko = $request->nama_toko;
        $pedagang->alamat_toko = $request->alamat_toko;
        $pedagang->no_telepon_pedagang = $request->no_telepon_pedagang;
        $pedagang->username_pedagang = $request->username_pedagang;

        if ($request->filled('password')) {
            $pedagang->password = bcrypt($request->password);
        }

        $pedagang->deskripsi_toko = $request->deskripsi_toko;
        $pedagang->save();

        return redirect()->route('pedagang.show', $pedagang->id)->with('success', 'Profil berhasil diperbarui');
    }
}
