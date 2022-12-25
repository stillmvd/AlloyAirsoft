<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AchievementsSeeder::class,
            AdminSeeder::class,
            ContactSeeder::class,
            GamesSeeder::class,
            TeamsSeeder::class,
            PricesSeeder::class,
        ]);
    }
}
