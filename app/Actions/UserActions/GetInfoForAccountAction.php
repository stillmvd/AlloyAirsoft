<?php

namespace App\Actions\UserActions;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;

class GetInfoForAccountAction
{
    /**
     * Возращаем данные пользователя
     *
     * @param int $id
     *
     * @return array
     */
    public function handle(int $id): array
    {
        $player = Player::find(User::find($id)->player->id);

        $achievements = $player->achievements;
        $games = $player->games;

        return [
            'player' => $player,
            'games' => $games,
            'achievements' => $achievements,
            'team' => Team::where('leader_id', $id)->get(),
        ];
    }
}
