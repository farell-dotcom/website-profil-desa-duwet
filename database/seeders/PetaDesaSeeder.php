<?php

namespace Database\Seeders;

use App\Models\PetaDesa; 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetaDesaSeeder extends Seeder
{
    public function run(): void
    {
        PetaDesa::create([
            'alamat' => 'Jl. Raya Desa No. 1, Kecamatan Contoh, Kabupaten Contoh',
            'link_google_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63377.13!2d112.6304!3d-7.9666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zN8KwNTgnMDAuMCJTIDExMsKwMzcnNTAuMCJF!5e0!3m2!1sid!2sid!4v1234567890',
            'deskripsi' => 'Desa ini terletak di dataran rendah dengan akses jalan utama yang mudah dijangkau dari pusat kabupaten.',
        ]);
    }
}
