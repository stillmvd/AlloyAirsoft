<?php
namespace App\Actions\AdminActions;

use App\Models\Player;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class GetAdminInfoAction
{
    /**
     * Возвращает данные для админки
     *
     * @return array
     */
    public function handle(): array
    {
        return [
            'games' => DB::table('games')->get(),
            'players' => DB::table('players')->get(),
            'game_players' => DB::table('game_player')->get(),
            'teams' => DB::table('teams')->get(),
            'teams_count' => DB::table('teams')->count(),
            'users' => DB::table('users')->get(),
            'phone' => DB::table('contact')->pluck('phone')[0],
            'admin' => Player::find(1001),
            'email' => User::pluck('email')[0],
        ];
    }
}
