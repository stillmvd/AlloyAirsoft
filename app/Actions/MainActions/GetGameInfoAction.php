<?php
namespace App\Actions\MainActions;

use App\Models\Game;
use App\Models\Info;
use App\Models\Price;
use App\Models\Rule;
use App\Models\Team;

use Illuminate\Support\Facades\DB;

class GetGameInfoAction
{
    /**
     * Возвращает массив данных об игре для вывода на сайт
     *
     * @param string $gameName Имя игры
     *
     * @return array
     */
    public function handle(string $gameName): array
    {
        if(Game::hasGame($gameName))
        {
            $gameId = Game::getIdByName($gameName);

            return [
                'game' => Game::find($gameId),

                'infos' => Info::getInfosByGameId($gameId),
                'rules' => Rule::getRulesByGameId($gameId),
                'prices' => Price::getPriceFromIdGame($gameId),
                'teams' => Team::getTeams(),
                'teams_count' => Team::getCountTeams(),

                'phone' => DB::table('contact')->pluck('phone')[0],
                'email' => DB::table('contact')->pluck('email')[0],
            ];
        }
        return [];
    }
}
