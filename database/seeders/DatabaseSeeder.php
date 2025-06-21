<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(DestinationSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(UserSeeder::class,);
        $this->call(ReviewSeeder::class,);
        
    }
}
