<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reviews;
use App\Models\User;
use App\Models\Destination;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil user dan destinasi (asumsi sudah ada lewat seeder sebelumnya)
        $andi = User::where('email', 'andi@example.com')->first();
        $sari = User::where('email', 'sari@example.com')->first();

        $kuta = Destination::where('slug', 'pantai-kuta')->first();
        $bajo = Destination::where('slug', 'labuan-bajo')->first();

        // Ulasan oleh Andi
        Reviews::create([
            'user_id' => $andi->id,
            'destination_id' => $kuta->id,
            'rating' => 5,
            'comment' => 'Pantainya sangat indah dan bersih. Sunset-nya luar biasa!',
        ]);

        // Ulasan oleh Sari
        Reviews::create([
            'user_id' => $sari->id,
            'destination_id' => $bajo->id,
            'rating' => 4,
            'comment' => 'Tempatnya ramai tapi sangat seru. Banyak pilihan makanan!',
        ]);
    }
}
