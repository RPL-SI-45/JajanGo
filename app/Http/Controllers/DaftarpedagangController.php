<?php

namespace App\Http\Controllers;

use App\Models\Pedagang;
use Illuminate\Http\Request;

class DaftarpedagangController extends Controller
{
    public function index(){
        $daftarpedagang = Pedagang::all();
        return view(('daftarpedagang'), compact('daftarpedagang'));
    }
}
