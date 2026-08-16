<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Kunjungan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalKunjungan = Kunjungan::totalKunjungan();
        $totalBerita = Berita::count();
        $beritaTerpopuler = Berita::orderBy('dibaca', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('totalKunjungan', 'totalBerita', 'beritaTerpopuler'));
    }

    public function index()
    {
        $admins = User::where('role', 'admin')->get();

        return view('admin.akun.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.akun.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => 'admin',
        ]);

        return redirect()->route('admin.akun.index')->with('sukses', 'Akun admin berhasil ditambahkan.');
    }

    public function destroy(User $user)
    {
        if ($user->role === 'super_admin') {
            abort(403, 'Akun super admin tidak bisa dihapus.');
        }

        $user->delete();

        return redirect()->route('admin.akun.index')->with('sukses', 'Akun admin berhasil dihapus.');
    }
}