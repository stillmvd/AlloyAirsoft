<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PricesSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            'name' => 'Gun',
            'price' => '40',
            'game_id' => '1002',
        ]);
        DB::table('prices')->insert([
            'name' => 'Gear',
            'price' => '20',
            'game_id' => '1002',
        ]);
    }
}
