<?php

namespace App\Actions;

use App\Models\Player;
use App\Models\User;
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
        $player = Player::find(User::find($id)->player->id);

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
