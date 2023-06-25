<?php

namespace App\Modules\Player\Db;

use App\Modules\Auth\Dto\SaveUserDto;

interface IPlayerDb
{
    const TABLE = 'players';

    public function createPlayer(SaveUserDto $dto): int;

    public function getById(int $id): array;

    public function getCountPlayers(): int;
}
