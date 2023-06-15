<?php

namespace App\Modules\Lk\Readers;

use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use App\Modules\Player\Db\IPlayerDb;

final class LkReader
{
    private User $userModel;
//    private IPlayerDb $playerDb;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function getDataForLk(string $token): array
    {
        $user = $this->userModel->getUserByToken($token);
        $player = Player::find($user->player->id);

        $achievements = $player->achievements;
        $games = $player->games;

        return [
            'player' => $player,
            'games' => $games,
            'achievements' => $achievements,
            'team' => Team::where('leader_id', $player->id)->get(),
        ];
    }

}
