<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;
use Illuminate\Support\Facades\Storage; // <-- Import Storage facade
use Illuminate\Support\Str;              // <-- Import Str untuk membuat nama acak

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan direktori tujuan ada. Jika tidak, buat.
        Storage::disk('public')->makeDirectory('packages');

        // Daftar paket yang akan di-seed
        $packagesData = [
            [
                'name' => 'Tour Candi Borobudur',
                'source_image' => 'BorobudurPackage.jpg',
                'description' => 'Jelajahi keindahan Candi Borobudur, situs Warisan Dunia UNESCO, dengan tur budaya 2 hari termasuk kunjungan ke candi dan objek wisata sekitar.',
                'price' => 1500000,
                'tickets' => '1 tiket hotel, 1 tiket wisata, 1 tiket makan',
            ],
            [
                'name' => 'Petualangan Raja Ampat',
                'source_image' => 'RajaAmpatPackage.jpg',
                'description' => 'Rasakan keindahan bawah laut Raja Ampat, surga bagi para penyelam. Tur 5 hari ini mencakup island hopping dan snorkeling di perairan jernih.',
                'price' => 5000000,
                'tickets' => '1 tiket hotel, 1 tiket snorkeling, 1 tiket makan',
            ],
            [
                'name' => 'Tour Gunung Bromo',
                'source_image' => 'BromoPackage.jpg',
                'description' => 'Ikuti tur 3 hari menjelajahi pemandangan menakjubkan Gunung Bromo, termasuk trekking matahari terbit, perjalanan jeep melintasi pasir vulkanik, dan kunjungan ke kawah.',
                'price' => 2000000,
                'tickets' => '1 tiket jeep, 1 tiket wisata, 1 tiket makan',
            ],
            [
                'name' => 'Tour Labuan Bajo',
                'source_image' => 'LabuanBajoPackage.jpg',
                'description' => 'Labuan Bajo, kota pesisir di Pulau Flores, terkenal dengan pemandangan memukau dan sebagai gerbang ke Taman Nasional Komodo, rumah bagi komodo legendaris.',
                'price' => 5000000,
                'tickets' => '1 tiket kapal, 1 tiket wisata, 1 tiket makan',
            ],
            [
                'name' => 'Tour Danau Toba',
                'source_image' => 'TobaPackage.jpg',
                'description' => 'Danau Toba di Sumatera Utara adalah danau vulkanik terbesar di dunia, terbentuk dari letusan besar lebih dari 74.000 tahun lalu.',
                'price' => 3250000,
                'tickets' => '1 tiket hotel, 1 tiket wisata, 1 tiket makan',
            ],
            [
                'name' => 'Pendakian Gunung Rinjani',
                'source_image' => 'RinjaniPackage.jpg',
                'description' => 'Gunung Rinjani setinggi 3.726 meter di Pulau Lombok adalah gunung berapi tertinggi kedua di Indonesia, terkenal dengan danau kawahnya yang indah, Segara Anak.',
                'price' => 1500000,
                'tickets' => '1 tiket trekking, 1 tiket hotel, 1 tiket makan',
            ],
        ];

        // Looping untuk setiap data paket
        foreach ($packagesData as $data) {
            // 1. Tentukan path gambar sumber di folder public/asset/
            $sourcePath = public_path('asset/' . $data['source_image']);

            // Inisialisasi path gambar baru
            $newImagePath = null;

            // 2. Cek apakah file sumber ada, lalu salin ke storage
            if (file_exists($sourcePath)) {
                // Buat nama file baru yang unik untuk disimpan di storage
                $newFileName = Str::random(10) . '_' . $data['source_image'];
                $newImagePath = 'packages/' . $newFileName;

                // Salin file dari public/asset ke storage/app/public/packages
                Storage::disk('public')->put($newImagePath, file_get_contents($sourcePath));
            }

            // 3. Buat record di database dengan path gambar yang baru
            Package::create([
                'name' => $data['name'],
                'image' => $newImagePath, // Gunakan path baru yang sudah disalin ke storage
                'description' => $data['description'],
                'price' => $data['price'],
                'tickets' => $data['tickets'],
            ]);
        }
    }
}
