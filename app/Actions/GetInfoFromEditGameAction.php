<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GetInfoFromEditGameAction
{

    /**
     * Возвращет данные игры для последущего редакитрования
     *
     * @param int $gameId id игры
     * @return array
     */
    public function getInfo(int $gameId)
    {
        if(DB::table('games')->where('id', $gameId)->count() >= 1)
        {
            $game = DB::table('games')->where('id', $gameId)->get()->all()[0];
            return [
                'infos' => DB::table('infos')->where('game_id', $gameId)->get()->first(),
                'rules' => DB::table('rules')->where('game_id', $gameId)->get(),
                'players' => DB::table('players')->where('game_id', $gameId)->get(),
                'game' => $game,
            ];
        }
    }
}
