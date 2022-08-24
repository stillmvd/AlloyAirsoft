<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class DeleteAllDataAction
{
    /**
     * Удаляет game infos rules из базы данных
     *
     * @param int gameId
     * @return void
     */
    public function delete(int $gameId)
    {
        DB::table('infos')->where('game_id', $gameId)->delete();
        DB::table('rules')->where('game_id', $gameId)->delete();
        DB::table('players')->where('game_id', $gameId)->delete();
        DB::table('games')->where('id', $gameId)->delete();
    }
}
