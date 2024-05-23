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
    public function lacakpesananPedagang()
{
    return view('lacakpesanan.lacakpesananPedagang');
}
}

