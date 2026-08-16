<?php

namespace Database\Seeders;

use App\Models\StrukturDesa; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrukturDesaSeeder extends Seeder
{
     public function run(): void
    {
        StrukturDesa::create([
            'nama' => 'Ahmad Sutrisno',
            'jabatan' => 'Kepala Desa',
        ]);

        StrukturDesa::create([
            'nama' => 'Siti Marlina',
            'jabatan' => 'Sekretaris Desa',
        ]);

        StrukturDesa::create([
            'nama' => 'Budi Santoso',
            'jabatan' => 'Bendahara Desa',
        ]);

        StrukturDesa::create([
            'nama' => 'Dewi Anggraini',
            'jabatan' => 'Kepala Urusan Pemerintahan',
        ]);

        StrukturDesa::create([
            'nama' => 'Rudi Hartono',
            'jabatan' => 'Kepala Urusan Pembangunan',
        ]);
    }
}
