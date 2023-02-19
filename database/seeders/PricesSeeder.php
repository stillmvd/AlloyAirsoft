<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            'name' => 'Game pass',
            'price' => '60',
            'game_id' => '1002',
        ]);

        DB::table('prices')->insert([
            'name' => 'Festival pass + food',
            'price' => '40',
            'game_id' => '1002',
        ]);

        DB::table('prices')->insert([
            'name' => 'Rent',
            'price' => '30',
            'game_id' => '1002',
        ]);

    }
}
