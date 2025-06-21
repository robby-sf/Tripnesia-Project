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
            $users = User::all();
            $destinations = Destination::all();

            $comments = [
                'Sangat menyenangkan!',
                'Tempatnya bersih dan indah.',
                'Cocok untuk liburan keluarga.',
                'Pemandangan luar biasa.',
                'Akan datang lagi lain waktu.',
                'Pelayanan di sekitar lokasi cukup baik.',
                'Harga terjangkau untuk pengalaman yang didapat.',
                'Kurang fasilitas umum, tapi oke secara keseluruhan.',
                'Pengalaman yang tak terlupakan!',
                'Rekomendasi banget buat wisata alam.',
            ];

            foreach ($destinations as $destination) {
                // Ambil 7 user acak (atau semua jika user < 7)
                $selectedUsers = $users->shuffle()->take(7);

                foreach ($selectedUsers as $user) {
                    Reviews::create([
                        'user_id' => $user->id,
                        'destination_id' => $destination->id,
                        'rating' => rand(3, 5),
                        'comment' => $comments[array_rand($comments)],
                    ]);
                }
            }
        }
    
}
