<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamsSeeder extends Seeder
{
    public function run()
    {
        DB::table('teams')->insert(['name' => 'Mercenaries']);
        DB::table('teams')->insert(['name' => 'Bandits']);
    }
}
