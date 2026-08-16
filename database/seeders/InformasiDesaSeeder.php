<?php

namespace Database\Seeders;

use App\Models\InformasiDesa; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformasiDesaSeeder extends Seeder
{
    public function run(): void
    {
        InformasiDesa::create([
            'visi' => 'Mewujudkan desa yang mandiri, sejahtera, dan berbudaya.',
            'misi' => 'Meningkatkan kualitas pelayanan publik, mengembangkan potensi ekonomi desa, dan melestarikan budaya lokal.',
            'sejarah' => 'Desa ini didirikan pada tahun 1945 oleh sekelompok warga yang bermigrasi dari daerah sekitar untuk membuka lahan pertanian baru.',
            'luas_wilayah' => '12,5 km2',
            'jumlah_penduduk' => '3.542 jiwa',
        ]);
    }
}
