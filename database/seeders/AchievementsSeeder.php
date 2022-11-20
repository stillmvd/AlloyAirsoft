<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AchievementsSeeder extends Seeder
{

    public function run()
    {
        DB::table('achievements')->insert([
            'nameAchievement' => 'Actor',
            'description' => 'Play off a friendly NPC',
        ]);

        DB::table('achievements')->insert([
            'nameAchievement' => 'Spy',
            'description' => 'Pass an optional event',
        ]);

        DB::table('achievements')->insert([
            'nameAchievement' => 'Villain',
            'description' => 'Play off an enemy NPC',
        ]);
    }
}
