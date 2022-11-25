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
            'games' => DB::table('games')->get(),
            'players' => DB::table('players')->get(),
            'game_players' => DB::table('game_player')->get(),
            'teams' => DB::table('teams')->get(),
            'teams_count' => DB::table('teams')->count(),
            'users' => DB::table('users')->get(),
            'email' => DB::table('contact')->pluck('email')[0],
            'phone' => DB::table('contact')->pluck('phone')[0],
            'admin' => Player::find(1001),
            'email' => User::pluck('email')[0],
        ];

        return $data;
    }
}
