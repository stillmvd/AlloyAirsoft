<?php

namespace App\Modules\Player\Db;

use App\Modules\Auth\Dto\SaveUserDto;

interface IPlayerDb
{
    const TABLE = 'players';

    public function createPlayer(SaveUserDto $dto): int;
}
