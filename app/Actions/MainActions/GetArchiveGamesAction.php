<?php
namespace App\Actions\MainActions;

use App\Models\Main\Game;
use App\Models\Team;
use Illuminate\Support\Facades\DB;

class GetArchiveGamesAction
{
    /**
     * Возвращает из базы данных игры которые завершены
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            'teams' => Team::getTeams(),

            'games' => Game::getFinishedGames(),
            'games_count' => Game::getCountGames(),

            'phone' => DB::table('contact')->pluck('phone')[0],
            'email' => DB::table('contact')->pluck('email')[0],
        ];

        return $data;
    }
}
