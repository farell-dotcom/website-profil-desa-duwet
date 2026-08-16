<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\InformasiDesa;
use App\Models\Kunjungan;
use App\Models\PetaDesa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        Kunjungan::catatKunjunganHariIni();

        $beritaTerkini = Berita::orderBy('tanggal', 'desc')->take(3)->get();
        $kunjunganHariIni = Kunjungan::hariIni();
        $informasi = InformasiDesa::first();
        $peta = PetaDesa::first();

        return view('dashboard.index', compact('beritaTerkini', 'kunjunganHariIni', 'informasi', 'peta'));
    }
}