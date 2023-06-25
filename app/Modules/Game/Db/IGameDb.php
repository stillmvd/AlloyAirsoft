<?php

namespace App\Modules\Game\Db;

interface IGameDb
{
    const TABLE = 'games';

    public function getAllGames(): array;

    public function getFinishedGames(): array;

    public function getNearbyGames():array;

    public function getCountFinishedGames(): int;
}
