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
        User::create([
            'nama' => 'Budi',
            'email' => 'budi@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0811111111',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Citra',
            'email' => 'citra@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0812222222',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Dika',
            'email' => 'dika@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0813333333',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Eka',
            'email' => 'eka@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0814444444',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Fajar',
            'email' => 'fajar@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0815555555',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Gita',
            'email' => 'gita@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0816666666',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Hadi',
            'email' => 'hadi@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0817777777',
            'profilePicture' => 'profilekosong.jpg',
        ]);

        User::create([
            'nama' => 'Intan',
            'email' => 'intan@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
            'nomorTelp' => '0818888888',
            'profilePicture' => 'profilekosong.jpg',
        ]);
    }
}
