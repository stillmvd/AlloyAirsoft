<?php

namespace App\Actions\MainActions;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class DeleteAllDataAction
{
    /**
     * Удаляет game infos rules из базы данных
     *
     * @param int gameId
     * @return void
     */
    public function handle(int $gameId)
    {
        DB::table('infos')->where('game_id', $gameId)->delete();
        DB::table('rules')->where('game_id', $gameId)->delete();
        Player::where('game_id', $gameId)->delete();
        Game::where('id', $gameId)->delete();
    }
}
