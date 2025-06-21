<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'nama' => 'Andi',
            'email' => 'andi@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '08123456789',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Sari',
            'email' => 'sari@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '08987654321',
            'profilePicture' => 'profilekosong.jpg',
        ]);
    }
}
