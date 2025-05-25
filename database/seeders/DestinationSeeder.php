<?php

namespace Database\Seeders;

use App\Models\Destination;
use Illuminate\Support\Str;

Destination::create([
    'nama' => 'Pantai Kuta',
    'slug' => Str::slug('Pantai Kuta'),
    'alamat' => 'Kuta, Badung, Bali',
    'deskripsi' => 'Pantai Kuta adalah salah satu pantai terkenal di Bali dengan pasir putih dan ombak yang cocok untuk berselancar.',
    'gambar' => 'kuta.jpg',
    'jam_buka' => '06:00',
    'jam_tutup' => '18:00',
    'harga' => 0,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3944.0360422373414!2d115.15746437406836!3d-8.717739391313901!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd2470b6c4725a5%3A0x5010bfb94a0c4d0!2sPantai%20Kuta!5e0!3m2!1sen!2sid!4v1625635412345!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);

Destination::create([
    'nama' => 'Labuan Bajo',
    'slug' => Str::slug('Labuan Bajo'),
    'alamat' => 'Labuan Bajo, Nusa Tenggara Timur',
    'deskripsi' => 'Labuan Bajo adalah gerbang menuju Taman Nasional Komodo, terkenal dengan keindahan alam bawah laut dan pantai eksotis.',
    'gambar' => 'Labuan bajo.jpg',
    'jam_buka' => '07:00',
    'jam_tutup' => '18:00',
    'harga' => 50000,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252032.14723956467!2d119.82584751781499!3d-8.486270981048537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db469ecf55fa129%3A0xf286be36ad24c92b!2sLabuan%20Bajo!5e0!3m2!1sid!2sid!4v1625640000000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);

Destination::create([
    'nama' => 'Pulau Komodo',
    'slug' => Str::slug('Pulau Komodo'),
    'alamat' => 'Taman Nasional Komodo, NTT',
    'deskripsi' => 'Pulau Komodo terkenal sebagai habitat asli komodo dan merupakan salah satu situs warisan dunia UNESCO.',
    'gambar' => 'Pulau Komodo.jpg',
    'jam_buka' => '07:00',
    'jam_tutup' => '17:00',
    'harga' => 100000,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63479.05331238224!2d119.45679857113284!3d-8.574001020119002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db46c8fae6acfbf%3A0x8470ef5e8beadab3!2sPulau%20Komodo!5e0!3m2!1sid!2sid!4v1625640300000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);

Destination::create([
    'nama' => 'Raja Ampat',
    'slug' => Str::slug('Raja Ampat'),
    'alamat' => 'Papua Barat',
    'deskripsi' => 'Raja Ampat adalah surga bawah laut yang memiliki keanekaragaman hayati laut yang sangat tinggi dan pemandangan luar biasa.',
    'gambar' => 'Raja Ampat.jpg',
    'jam_buka' => '06:00',
    'jam_tutup' => '17:00',
    'harga' => 150000,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127107.98324606557!2d130.41736200572366!3d-0.23416239702136508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d5db438ca9e7a15%3A0x21e962c2d4b8ebea!2sRaja%20Ampat%2C%20Papua%20Barat!5e0!3m2!1sid!2sid!4v1625640600000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);

Destination::create([
    'nama' => 'Dieng',
    'slug' => Str::slug('Dieng'),
    'alamat' => 'Dieng Plateau, Wonosobo, Jawa Tengah',
    'deskripsi' => 'Dataran tinggi Dieng memiliki pemandangan pegunungan, kawah aktif, dan situs budaya kuno.',
    'gambar' => 'Dieng.webp',
    'jam_buka' => '06:00',
    'jam_tutup' => '17:00',
    'harga' => 20000,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3952.208783094927!2d109.92584277407308!3d-7.209900092777373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f7f3c12c07b41%3A0x8c2f2ec3cc8a0f0b!2sDieng%20Plateau!5e0!3m2!1sid!2sid!4v1625640800000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);

Destination::create([
    'nama' => 'Candi Baratan',
    'slug' => Str::slug('Candi Baratan'),
    'alamat' => 'Magelang, Jawa Tengah',
    'deskripsi' => 'Candi Baratan adalah salah satu situs bersejarah di Jawa Tengah yang menampilkan arsitektur khas Hindu-Buddha.',
    'gambar' => 'Candi Baratan.jpg',
    'jam_buka' => '07:00',
    'jam_tutup' => '17:00',
    'harga' => 40000,
    'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.271287169948!2d110.20318577407074!3d-7.543328175966091!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a836d99bd2077%3A0x68d98426386d3a2!2sCandi%20Baratan!5e0!3m2!1sid!2sid!4v1625641000000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',
]);
