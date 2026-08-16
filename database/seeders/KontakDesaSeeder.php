<?php

namespace Database\Seeders;

use App\Models\KontakDesa; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KontakDesaSeeder extends Seeder
{
    public function run(): void
    {
        KontakDesa::create([
            'alamat' => 'Jl. Raya Desa No. 1, Kecamatan Contoh, Kabupaten Contoh',
            'telepon' => '(0341) 123456',
            'email' => 'desacontoh@email.com',
            'jam_pelayanan' => 'Senin - Jumat, 08.00 - 15.00 WIB',
        ]);
    }
}
