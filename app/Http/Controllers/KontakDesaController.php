<?php

namespace App\Http\Controllers;

use App\Models\KontakDesa;
use Illuminate\Http\Request;

class KontakDesaController extends Controller
{
     public function index()
    {
        $kontak = KontakDesa::first();

        return view('kontak.index', compact('kontak'));
    }
}
