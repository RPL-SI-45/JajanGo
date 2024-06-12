<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Diskon;
use App\Models\DaftarMenu;

class DiskonController extends Controller
{
    public function index()
    {
        $daftarMenu = DaftarMenu::all(); //KALO DAH ADA AUTH GANTI!!!!
        $diskon = Diskon::all();

        return view('diskon.create', compact('daftarMenu', 'diskon'));
    }

    public function create(Request $request)
    {
        $attributes = $request->validate([
            'namaMenu' => 'required',
            'kodeKupon' => 'required',
            'persentaseDiskon' => 'required',
        ]);

        // Create a new Diskon record
        $data = Diskon::create([
            "namaMenu" => $attributes['namaMenu'],
            "kodeKupon" => $attributes['kodeKupon'],
            "persentaseDiskon" => $attributes['persentaseDiskon']
        ]);

        // Redirect or return a response
        return redirect('/diskon/daftardiskon');
    }
}
