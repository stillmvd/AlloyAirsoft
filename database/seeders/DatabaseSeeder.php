<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        ]);
    }
}
