<?php

namespace Database\Seeders;

use App\Models\Berita;
use App\Models\User;
use Illuminate\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('role', 'admin')->first();

        Berita::create([
            'judul' => 'Gotong Royong Bersih Desa Duwet',
            'isi' => 'Warga Desa Duwet mengadakan kegiatan gotong royong membersihkan lingkungan desa pada akhir pekan lalu. Kegiatan ini diikuti oleh seluruh perangkat desa dan warga setempat.',
            'tanggal' => now()->subDays(3),
            'gambar' => null,
            'user_id' => $admin->id,
        ]);

        Berita::create([
            'judul' => 'Pembangunan Jalan Desa Tahap Kedua Dimulai',
            'isi' => 'Pemerintah Desa Duwet resmi memulai pembangunan jalan desa tahap kedua yang menghubungkan dusun-dusun di wilayah desa, guna mempermudah akses transportasi warga.',
            'tanggal' => now()->subDay(),
            'gambar' => null,
            'user_id' => $admin->id,
        ]);
    }
}