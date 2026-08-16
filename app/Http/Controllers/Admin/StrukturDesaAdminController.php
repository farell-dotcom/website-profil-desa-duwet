<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturDesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturDesaAdminController extends Controller
{
    public function index()
    {
        $struktur = StrukturDesa::all();

        return view('admin.struktur.index', compact('struktur'));
    }

    public function create()
    {
        return view('admin.struktur.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        StrukturDesa::create($validated);

        return redirect()->route('admin.struktur.index')->with('sukses', 'Data perangkat desa berhasil ditambahkan.');
    }

    public function edit(StrukturDesa $struktur)
    {
        return view('admin.struktur.edit', compact('struktur'));
    }

    public function update(Request $request, StrukturDesa $struktur)
    {
        $validated = $request->validate([
            'nama' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'foto' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            if ($struktur->foto) {
                Storage::disk('public')->delete($struktur->foto);
            }

            $validated['foto'] = $request->file('foto')->store('struktur', 'public');
        }

        $struktur->update($validated);

        return redirect()->route('admin.struktur.index')->with('sukses', 'Data perangkat desa berhasil diperbarui.');
    }

    public function destroy(StrukturDesa $struktur)
    {
        if ($struktur->foto) {
            Storage::disk('public')->delete($struktur->foto);
        }

        $struktur->delete();

        return redirect()->route('admin.struktur.index')->with('sukses', 'Data perangkat desa berhasil dihapus.');
    }
}