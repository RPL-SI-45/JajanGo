<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Diskon;

class DiskonController extends Controller
{
    public function index()
    {
        $diskon = Diskon::all();
        return view('inputdiskon.create', compact('diskon'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'kodeKupon' => 'required|alpha',
            'persentasediskon' => 'required|numeric',
        ]);

        $diskon = new Diskon();
        $diskon->kodeKupon = $request->kodeKupon;
        $diskon->persentasediskon = $request->persentasediskon;
        $diskon->save();

        return redirect()->route('daftardiskon.index');
    }
}