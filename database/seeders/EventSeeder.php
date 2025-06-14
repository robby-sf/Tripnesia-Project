<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        Event::create([
            'title' => 'Festival Budaya Bali',
            'slug' => Str::slug('Festival Budaya Bali'),
            'description' => 'Nikmati keindahan seni dan budaya Bali dalam acara ini.',
            'event_date' => '2025-06-15',
            'location' => 'Denpasar, Bali',
            'image' => 'festival-bali.jpg',
        ]);

        Event::create([
            'title' => 'Jazz Gunung Bromo',
            'slug' => Str::slug('Jazz Gunung Bromo'),
            'description' => 'Konser musik jazz dengan latar alam Gunung Bromo.',
            'event_date' => '2025-07-01',
            'location' => 'Probolinggo, Jawa Timur',
            'image' => 'jazz-bromo.jpg',
        ]);
    }
}
