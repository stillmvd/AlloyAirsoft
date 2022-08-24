<?php
namespace App\Actions;

use App\Models\Game;
use App\Models\Info;
use App\Models\Rule;

use Illuminate\Support\Facades\DB;

class GetGameInfoAction
{
    /**
     * Возвращает массив данных об игре для вывода на сайт
     * @param int $gameId id игры
     * @return array
     */
    public function getInfo(int $gameId)
    {
        $rules = Rule::where('game_id', $gameId)->get();
        return [
            'first_cord' => Game::find($gameId)->first_cord,
            'second_cord' => Game::find($gameId)->second_cord,
            'infos' => Info::where('game_id', $gameId)->first(),
            'rules' => $rules,
            'amount' => $rules->count(),
            'game' => Game::find($gameId),
            'teams' => DB::table('teams')->get('name'),
            'teams_count' => DB::table('teams')->count(),
        ];
    }
}
