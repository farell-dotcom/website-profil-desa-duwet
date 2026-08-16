<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformasiDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformasiDesaAdminController extends Controller
{
    public function edit()
    {
        $informasi = InformasiDesa::first();

        return view('admin.informasi.edit', compact('informasi'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'visi' => ['required', 'string'],
            'misi' => ['required', 'string'],
            'sejarah' => ['required', 'string'],
            'luas_wilayah' => ['required', 'string'],
            'jumlah_penduduk' => ['required', 'string'],
            'nama_kepala_desa' => ['nullable', 'string', 'max:255'],
            'sambutan' => ['nullable', 'string'],
            'foto_kepala_desa' => ['nullable', 'image', 'max:2048'],
            'jumlah_laki_laki' => ['nullable', 'string', 'max:255'],
            'jumlah_perempuan' => ['nullable', 'string', 'max:255'],
            'jumlah_kk' => ['nullable', 'string', 'max:255'],
        ]);

        $informasi = InformasiDesa::first();

        if ($request->hasFile('foto_kepala_desa')) {
            if ($informasi && $informasi->foto_kepala_desa) {
                Storage::disk('public')->delete($informasi->foto_kepala_desa);
            }

            $validated['foto_kepala_desa'] = $request->file('foto_kepala_desa')->store('kepala-desa', 'public');
        }

        if ($informasi) {
            $informasi->update($validated);
        } else {
            InformasiDesa::create($validated);
        }

        return redirect()->route('admin.informasi.edit')->with('sukses', 'Informasi desa berhasil diperbarui.');
    }
}