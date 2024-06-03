<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Diskon;

class DaftarDiskonController extends Controller
{
    public function index()
    {
        $diskon = Diskon::all();
        return view('inputdiskon.daftardiskon', compact('diskon'));
    }

    // Metode untuk memproses data dari formulir dan menyimpannya
    public function store(Request $request)
    {
        // Logika untuk menyimpan data dari formulir
    }
}