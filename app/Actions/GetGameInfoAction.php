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
     * @param string $gameName Имя игры
     * @return array
     */
    public function getInfo(string $gameName)
    {
        if(Game::where('name', $gameName)->count() >= 1)
        {
            $gameId = Game::where('name', $gameName)->get()[0]->id;
            $rules = Rule::where('game_id', $gameId)->get();
            return [
                'first_cord' => Game::find($gameId)->first_cord,
                'second_cord' => Game::find($gameId)->second_cord,
                'infos' => Info::where('game_id', $gameId)->first(),
                'rules' => $rules,
                'amount' => $rules->count(),
                'game' => Game::find($gameId),
                'teams' => DB::table('teams')->get(),
                'teams_count' => DB::table('teams')->count(),
                'phone' => DB::table('contact')->pluck('phone')[0],
                'email' => DB::table('contact')->pluck('email')[0],
            ];
        }
    }
}
