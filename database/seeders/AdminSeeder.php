<?php

namespace Database\Seeders;

use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run()
    {

        User::insert([
            'email' => 'glebka@gmail.com',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'isActive' => true,
            'isAdmin' => true,
        ]);

        User::insert([
            'email' => 'threeh1@vk.com',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'isActive' => true,
            'isAdmin' => true,
        ]);

        User::insert([
            'email' => 'asslocker@vk.com',
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'isActive' => true,
            'isAdmin' => true,
        ]);
    }
}
