<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            InformasiDesaSeeder::class,
            StrukturDesaSeeder::class,
            PetaDesaSeeder::class,
            KontakDesaSeeder::class,
            UserSeeder::class,
            BeritaSeeder::class,
        ]);
    }
}
