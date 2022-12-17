<?php

namespace App\Actions\AdminActions;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class GetInfoFromEditGameAction
{

    /**
     * Возвращет данные игры для последущего редакитрования
     *
     * @param int $gameId id игры
     * @return array
     */
    public function handle(int $gameId)
    {
        if(Game::where('id', $gameId)->count() >= 1)
        {
            $game = Game::where('id', $gameId)->get()->all()[0];

            $data = [
                'infos' => DB::table('infos')->where('game_id', $gameId)->get()->first(),
                'rules' => DB::table('rules')->where('game_id', $gameId)->get(),
                'players' => Player::where('game_id', $gameId)->get(),
                'game' => $game,
            ];

            return $data;
        }
    }
}
