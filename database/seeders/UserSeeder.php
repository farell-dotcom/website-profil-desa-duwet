<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin Desa Duwet',
            'email' => 'superadmin@desaduwet.com',
            'password' => Hash::make('password123'),
            'role' => 'super_admin',
        ]);

        User::create([
            'name' => 'Staf Kantor Kepala Desa',
            'email' => 'admin@desaduwet.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
        ]);
    }
}