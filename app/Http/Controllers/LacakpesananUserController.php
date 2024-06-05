<?php

namespace App\Http\Controllers;

use App\Models\LacakpesananUser;
use Illuminate\Http\Request;

class LacakpesananUserController extends Controller
{
    public function index()
{
    $lacakpesanan = LacakpesananUser::all();
    return view('lacakpesanan.lacakpesananUser', compact('lacakpesanan'));
}

}
