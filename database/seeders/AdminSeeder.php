<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Admin Satu',
            'email' => 'admin1@example.com',
            'alamat' => 'Jl. Contoh No.1',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1990-01-01',
            'role' => 'superadmin',
            'nomor_telp' => '0811111111',
        ]);

        Admin::create([
            'nama' => 'Admin Dua',
            'email' => 'admin2@example.com',
            'alamat' => 'Jl. Contoh No.2',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1991-02-02',
            'role' => 'admin',
            'nomor_telp' => '0811111112',
        ]);

        Admin::create([
            'nama' => 'Admin Tiga',
            'email' => 'admin3@example.com',
            'alamat' => 'Jl. Contoh No.3',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1992-03-03',
            'role' => 'admin',
            'nomor_telp' => '0811111113',
        ]);

        Admin::create([
            'nama' => 'Admin Empat',
            'email' => 'admin4@example.com',
            'alamat' => 'Jl. Contoh No.4',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1993-04-04',
            'role' => 'admin',
            'nomor_telp' => '0811111114',
        ]);

        Admin::create([
            'nama' => 'Admin Lima',
            'email' => 'admin5@example.com',
            'alamat' => 'Jl. Contoh No.5',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1994-05-05',
            'role' => 'admin',
            'nomor_telp' => '0811111115',
        ]);

        Admin::create([
            'nama' => 'Admin Enam',
            'email' => 'admin6@example.com',
            'alamat' => 'Jl. Contoh No.6',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1995-06-06',
            'role' => 'admin',
            'nomor_telp' => '0811111116',
        ]);

        Admin::create([
            'nama' => 'Admin Tujuh',
            'email' => 'admin7@example.com',
            'alamat' => 'Jl. Contoh No.7',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1996-07-07',
            'role' => 'admin',
            'nomor_telp' => '0811111117',
        ]);

        Admin::create([
            'nama' => 'Admin Delapan',
            'email' => 'admin8@example.com',
            'alamat' => 'Jl. Contoh No.8',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1997-08-08',
            'role' => 'admin',
            'nomor_telp' => '0811111118',
        ]);

        Admin::create([
            'nama' => 'Admin Sembilan',
            'email' => 'admin9@example.com',
            'alamat' => 'Jl. Contoh No.9',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1998-09-09',
            'role' => 'admin',
            'nomor_telp' => '0811111119',
        ]);

        Admin::create([
            'nama' => 'Admin Sepuluh',
            'email' => 'admin10@example.com',
            'alamat' => 'Jl. Contoh No.10',
            'password' => Hash::make('password123'),
            'tanggal_lahir' => '1999-10-10',
            'role' => 'admin',
            'nomor_telp' => '0811111120',
        ]);
    }
}
