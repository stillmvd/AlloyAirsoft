<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Game;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
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
            'playtime' => '2022-03-14 12:15:12',
        ]);

        DB::table('games')->insert([
            'name' => 'Huirov',
            'first_cord' => 56.3926128,
            'second_cord' => 38.1018651,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'playtime' => '2022-5-10 15:33:10',
        ]);

        DB::table('games')->insert([
            'name' => 'Temich',
            'first_cord' => 56.2384338,
            'second_cord' => 43.4570157,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'playtime' => '2022-2-22 10:10:10',
        ]);

        $user_id = User::find(1001)->id;

        DB::table('user_game')->insert([
            'user_id' => $user_id,
            'game_id' => Game::find(1001)->name . ' ' . Game::find(1002)->name . ' ' . Game::find(1003)->name,
        ]);
    }
}
