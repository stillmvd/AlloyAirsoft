<?php
namespace App\Actions;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GetAdminInfoAction
{
    /**
     * Возвращает данные для админки
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            'games' => Game::get(),
            'players' => Player::get(),
            'teams' => Team::get(),
            'teams_count' => Team::get()->count(),
            'users' => User::get(),
            'email' => DB::table('contact')->pluck('email')[0],
            'phone' => DB::table('contact')->pluck('phone')[0],
            'admin' => Player::find(1001),
            'email' => User::pluck('email')[0],
        ];

        return $data;
    }
}
