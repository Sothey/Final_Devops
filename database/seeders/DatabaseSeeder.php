<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 sample users
        User::factory(10)->create();

        // Call other seeders
        $this->call([
            TerrainSeeder::class,
            BookingSeeder::class,
            ReviewSeeder::class,
            FavoriteSeeder::class,
        ]);
    }
}
