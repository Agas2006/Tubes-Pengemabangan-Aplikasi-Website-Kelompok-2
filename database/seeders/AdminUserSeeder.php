<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@example.com'], // cek email biar ga dobel
            [
                'name' => 'Administrator',
                'password' => Hash::make('1234567890'), // ganti sesuai kebutuhan
                'role' => 'admin', // pastikan kolom role ada di tabel users
            ]
        );
    }
}