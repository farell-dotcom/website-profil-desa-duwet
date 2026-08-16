<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $pengaduan = Pengaduan::orderBy('created_at', 'desc')->get();

        return view('admin.pengaduan.index', compact('pengaduan'));
    }

    public function updateStatus(Request $request, Pengaduan $pengaduan)
    {
        $request->validate([
            'status' => ['required', 'in:baru,diproses,selesai'],
        ]);

        $pengaduan->update(['status' => $request->status]);

        return redirect()->route('admin.pengaduan.index')->with('sukses', 'Status pengaduan diperbarui.');
    }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();

        return redirect()->route('admin.pengaduan.index')->with('sukses', 'Pengaduan berhasil dihapus.');
    }
}