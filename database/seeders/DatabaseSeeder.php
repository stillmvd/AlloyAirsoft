<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Game;
use App\Models\User;
use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'login' => 'Ginze',
            'email' => 'glebka@gmail.com',
            'first_name' => 'Hlib',
            'second_name' => 'Fedchenko',
            'isAdmin' => 1,
            'password' => Hash::make(env('AD_PASSWORD'))
        ]);

        DB::table('games')->insert([
            'name' => 'Kirov',
            'first_cord' => 58.5854678,
            'second_cord' => 49.4319945,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'date' => '22.08.19',
        ]);

        DB::table('games')->insert([
            'name' => 'Huirov',
            'first_cord' => 56.3926128,
            'second_cord' => 38.1018651,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'date' => '22.09.04',
        ]);

        DB::table('games')->insert([
            'name' => 'Temich',
            'first_cord' => 56.2384338,
            'second_cord' => 43.4570157,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'date' => '22.10.16', 
        ]);

        $user_id = User::find(1001)->id;

        DB::table('user_game')->insert([
            'user_id' => $user_id,
            'game_id' => Game::find(1001)->name . ' ' . Game::find(1002)->name . ' ' . Game::find(1003)->name,
        ]);
    }
}
