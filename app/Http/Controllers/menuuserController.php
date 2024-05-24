<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MenuUser;

class menuuserController extends Controller
{
    public function index(){
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
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

    }
}