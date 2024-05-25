<?php

namespace App\Http\Controllers;

use App\Models\LacakpesananPedagang;
use Illuminate\Http\Request;

class LacakpesananPedagangController extends Controller
{
    public function index()
{
    $lacakpesanan = LacakpesananPedagang::all();
    return view('lacakpesanan.lacakpesananPedagang', compact('lacakpesanan'));
}
//     public function lacakpesananPedagang()
// {
//     return view('lacakpesanan.lacakpesananPedagang');
// }

    public function updateStatus(Request $request)
    {
        $lacakpesanan = LacakpesananPedagang::find($request->idPelacakan);

        $lacakpesanan->update([
            'statusPelacakan' => $request->status
        ]);
        return redirect()->back();
    }
}


