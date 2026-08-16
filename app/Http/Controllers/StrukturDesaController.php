<?php

namespace App\Http\Controllers;

use App\Models\StrukturDesa;
use Illuminate\Http\Request;

class StrukturDesaController extends Controller
{
     public function index()
    {
        $struktur = StrukturDesa::all();

        return view('struktur.index', compact('struktur'));
    }
}
