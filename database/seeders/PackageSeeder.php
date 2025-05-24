<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan paket pertama
        Package::create([
            'name' => 'Borobudur Temple Tour',
            'image' => 'BorobudurPackage.jpg',
            'description' => 'Explore the magnificent Borobudur Temple, a UNESCO World Heritage site, with this 2-day cultural tour including a visit to nearby temples and local attractions.',
            'price' => 1500000,
        ]);

        // Menambahkan paket kedua
        Package::create([
            'name' => 'Raja Ampat Adventure',
            'image' => 'RajaAmpatPackage.jpg',
            'description' => 'Experience the stunning underwater world of Raja Ampat, a paradise for divers. This 5-day tour includes island hopping and snorkeling in crystal-clear waters.',
            'price' => 5000000,
        ]);

        // Menambahkan paket ketiga
        Package::create([
            'name' => 'Mount Bromo Sunrise Tour',
            'image' => 'BromoPackage.jpg',
            'description' => 'Join a 3-day tour to explore the breathtaking views of Mount Bromo, including a sunrise trek, jeep ride across the volcanic sand, and visit to nearby crater.',
            'price' => 2000000,
        ]);

        // Menambahkan paket keempat
        Package::create([
            'name' => 'Labuan Bajo',
            'image' => 'LabuanBajoPackage.jpg',
            'description' => 'Labuan Bajo, a coastal town on Flores Island, is known for its stunning landscapes and as the gateway to Komodo National Park, home to the legendary Komodo dragons.',
            'price' => 5000000,
        ]);

        // Menambahkan paket kelima
        Package::create([
            'name' => 'Toba Lake',
            'image' => 'TobaPackage.jpg',
            'description' => 'Lake Toba, located in northern Sumatra, Indonesia, is the world\'s largest volcanic lake, formed by a massive eruption over 74,000 years ago.',
            'price' => 3250000,
        ]);

        // Menambahkan paket keenam
        Package::create([
            'name' => 'Mount Rinjani',
            'image' => 'RinjaniPackage.jpg',
            'description' => 'Mount Rinjani, standing at 3,726 meters on Lombok Island, is Indonesia’s second-highest volcano, famous for its striking crater lake, Segara Anak.',
            'price' => 1500000,
        ]);
    }
}
