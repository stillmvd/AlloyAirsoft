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
        // ---------- Admin
        DB::table('users')->insert([
            'login' => 'Ginze',
            'email' => 'glebka@gmail.com',
            'name' => 'Hlib',
            'surname' => 'Fedchenko',
            'isAdmin' => 1,
            'password' => Hash::make(env('AD_PASSWORD'))
        ]);

        // ---------- Games
        DB::table('games')->insert([
            'name' => 'Woodpecker',
            'first_cord' => 43.144122,
            'second_cord' => -80.258407,
            'polygon' => 'Clarington Woods',
            'description' => 'A 24 hours mission to find and identify signal marks on the enemy territory with small fire team.
            Number of enemy teams: unknown
            Amount of locals on the territory: unknown',
            'playtime' => '2022.08.19 10:30:00',
        ]);

        // DB::table('games')->insert([
        //     'name' => 'Barrie',
        //     'first_cord' => 44.393084,
        //     'second_cord' => -79.689487,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
        //     'playtime' => '2022.09.04 13:30:00',
        // ]);

        // DB::table('games')->insert([
        //     'name' => 'Kingston',
        //     'first_cord' => 44.231527,
        //     'second_cord' => -76.490457,
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
        //     'playtime' => '2022.08.19 15:45:00',
        // ]);

        // $user_id = User::find(1001)->id;

        // DB::table('user_game')->insert([
        //     'user_id' => $user_id,
        //     'game_id' => Game::find(1001)->name . ' ' . Game::find(1002)->name . ' ' . Game::find(1003)->name,
        // ]);
    }
}
