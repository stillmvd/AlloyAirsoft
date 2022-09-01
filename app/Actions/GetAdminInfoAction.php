<?php
namespace App\Actions;

use App\Models\Player;
use Illuminate\Support\Facades\DB;

class GetAdminInfoAction
{
    /**
     * Возвращает данные для админки
     *
     * @return array
     */
    public function getInfo()
    {
        return [
            'games' => DB::table('games')->get(),
            'players' => DB::table('players')->get(),
            'teams' => DB::table('teams')->get(),
            'teams_count' => DB::table('teams')->count(),
            'users' => DB::table('users')->get(),
            'email' => DB::table('contact')->pluck('email')[0],
            'phone' => DB::table('contact')->pluck('phone')[0],
            'admin' => Player::find(1001),
            'login' => DB::table('users')->pluck('login')[0],
        ];
    }
}
