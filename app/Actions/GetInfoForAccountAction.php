<?php

namespace App\Actions;

use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetInfoForAccountAction
{
    /**
     * Возращаем данные пользователя
     *
     * @param int $id
     *
     * @return array
     */
    public function handle(int $id)
    {
        $player = Player::find($id);

        $achievements = $player->achievements;
        $games = $player->games;

        $data = [
            'player' => $player,
            'games' => $games,
            'achievements' => $achievements,
        ];

        return $data;
    }
}
