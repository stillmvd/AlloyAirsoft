<?php

namespace App\Modules\Game\Db;

interface IGamePlayersDb
{
    const TABLE = 'game_player';

    public function getCountPlayerInGameById(int $id): int;
}
