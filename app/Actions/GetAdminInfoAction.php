<?php
namespace App\Actions;

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
        ];
    }
}
