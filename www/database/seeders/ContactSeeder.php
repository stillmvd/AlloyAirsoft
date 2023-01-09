<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{

    public function run()
    {
        DB::table('contact')->insert([
            'email' => 'glebka@gmail.com',
            'phone' => '+1-613-555-0137',
        ]);
    }
}
