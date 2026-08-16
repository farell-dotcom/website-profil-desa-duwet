<?php

namespace App\Http\Controllers;

use App\Models\PetaDesa;
use Illuminate\Http\Request;

class PetaDesaController extends Controller
{
    public function index()
    {
        $peta = PetaDesa::first();

        return view('peta.index', compact('peta'));
    }
}
