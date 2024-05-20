<?php

namespace App\Http\Controllers;

use App\Models\Lacakpesanan;
use Illuminate\Http\Request;

class LacakpesananController extends Controller
{
    public function index (){
        $lacakpesanan = Lacakpesanan::all();
        return view('lacakpesanan.lacakpesananUser', compact(['lacakpesanan']));
    }

}
