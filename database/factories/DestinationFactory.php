<?php

namespace Database\Factories;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DestinationFactory extends Factory
{
    protected $model = Destination::class;

    public function definition(): array
    {
        return [
            'nama' => 'Labuan Bajo',
            'slug' => Str::slug('Labuan Bajo'),
            'alamat' => 'Labuan Bajo, Nusa Tenggara Timur',
            'deskripsi' => 'Labuan Bajo adalah gerbang menuju Taman Nasional Komodo, terkenal dengan keindahan alam bawah laut dan pantai eksotis.',
            'gambar' => 'Labuan bajo.jpg',
            'jam_buka' => '07:00',
            'jam_tutup' => '18:00',
            'harga' => 50000,
            'maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d252032.14723956467!2d119.82584751781499!3d-8.486270981048537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db469ecf55fa129%3A0xf286be36ad24c92b!2sLabuan%20Bajo!5e0!3m2!1sid!2sid!4v1625640000000!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>',

        ];
    }
}