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
            'playtime' => '2022.08.19 12:15:12',
        ]);

        DB::table('games')->insert([
            'name' => 'Huirov',
            'first_cord' => 56.3926128,
            'second_cord' => 38.1018651,
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores obcaecati modi pariatur harum sunt ab quibusdam labore cumque eius omnis, quas nostrum, quasi in eligendi vel ad facilis. Numquam, voluptatibus.',
            'playtime' => '2022.08.19 12:15:12',
        ]);

        DB::table('games')->insert([
            'name' => 'Woodpecker',
            'first_cord' => 56.2384338,
            'second_cord' => 43.4570157,
            'description' => 'Hello mercenaries!
            Our company is extremely interested in renting your services for identification
            signals on territory hostile to us with a large group of unidentified
            armed individuals involved in activities and for information about which we
            Of course we will pay you. According to our records, you may also be interfered with by our
            “Colleagues”, do with them at your own discretion, no fines or rewards for
            You dont have to remove them.

            To clarify one point, we cannot transfer a group of more than 11 people, so
            Choose your best fighters and equip as you see fit.  Take with you
            everything you need, because due to high risks we are not ready to transfer supplies
            to this territory.

            You have 24 hours for everything about everything, you will receive your payment at a personal meeting after
            evacuation from the area.',
            'playtime' => '2022.08.19 12:15:12',
        ]);

        $user_id = User::find(1001)->id;

        DB::table('user_game')->insert([
            'user_id' => $user_id,
            'game_id' => Game::find(1001)->name . ' ' . Game::find(1002)->name . ' ' . Game::find(1003)->name,
        ]);
    }
}
