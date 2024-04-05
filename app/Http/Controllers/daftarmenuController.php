<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DaftarMenu;

class daftarmenuController extends Controller
{
    public function index(){
        $daftarmenu = DaftarMenu::all();

        return view('daftarmenu.index');
    }
}
