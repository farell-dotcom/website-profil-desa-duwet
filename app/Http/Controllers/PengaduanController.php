<?php

namespace App\Http\Controllers;

use App\Models\KontakDesa;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'telepon' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
        ]);

        Pengaduan::create($validated);

        $kontak = KontakDesa::first();
        $nomorWa = $kontak && $kontak->nomor_whatsapp ? $kontak->nomor_whatsapp : '';

        $pesan = "Pengaduan dari {$validated['nama']} ({$validated['telepon']}):\n\n{$validated['isi']}";
        $waLink = 'https://wa.me/' . $nomorWa . '?text=' . urlencode($pesan);

        return redirect($waLink);
    }
}