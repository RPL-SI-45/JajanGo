<?php

namespace App\Http\Controllers;

use App\Models\Daftarpedagang;
use Illuminate\Http\Request;

class DaftarpedagangController extends Controller
{
    public function index(){
        $daftarpedagang = Daftarpedagang::all();
        return view(('daftarpedagang'), compact('daftarpedagang'));
    }
}
