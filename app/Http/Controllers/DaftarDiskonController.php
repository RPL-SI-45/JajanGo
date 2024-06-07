<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Diskon;

class DaftarDiskonController extends Controller
{
 // app/Http/Controllers/YourController.php
    public function index()
    {
        $diskon = Diskon::with('daftarMenu')->get();
        return view('diskon.daftardiskon', compact('diskon'));
    }


    // Metode untuk memproses data dari formulir dan menyimpannya
    public function store(Request $request)
    {
        // Logika untuk menyimpan data dari formulir
    }

    public function showpromo(Request $request)
    {
        $diskon = Diskon::all();
        return view('diskon.daftarpromo', compact('diskon'));
    }
    
    public function destroy(int $id)
    {
        $diskon = Diskon::where('id',$id)->delete();
        return redirect('/diskon/daftardiskon');
    }
    
    public function edit($id)
    {
        $diskon = Diskon::findOrFail($id);
        return view('diskon.editdaftardiskon', compact('diskon'));
    }

    public function update(Request $request, $id)
    {
        $attributes = $request->validate([
            'kodeKupon' => 'required',
            'persentaseDiskon' => 'required',
        ]);
    
        $diskon = Diskon::find($id);
        $diskon->update([
            "kodeKupon" => $attributes['kodeKupon'],
            "persentaseDiskon" => $attributes['persentaseDiskon']
        ]);

        return redirect('/diskon/daftardiskon');
    }

}