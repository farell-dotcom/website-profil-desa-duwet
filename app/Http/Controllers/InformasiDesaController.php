<?php

namespace App\Http\Controllers;

use App\Models\InformasiDesa;
use Illuminate\Http\Request;

class InformasiDesaController extends Controller
{
    public function index()
    {
        $informasi = InformasiDesa::first();

        return view('informasi.index', compact('informasi'));
    }
}
