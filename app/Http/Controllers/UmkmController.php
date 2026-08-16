<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use Illuminate\Http\Request;

class UmkmController extends Controller
{
    public function index()
    {
        $umkm = Umkm::orderBy('nama_usaha')->get();

        return view('umkm.public_index', compact('umkm'));
    }
}