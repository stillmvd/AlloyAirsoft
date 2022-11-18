<?php

namespace App\Actions;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetInfoForAccountAction
{
    public function get(int $id)
    {
        $player = Player::find($id);
        $games = $player->games;
        return [
            'player' => $player,
            'games' => $games,
            'achievements' => DB::table('achievement_player')->where('player_id', Auth::id())->get(),
        ];
    }
}
