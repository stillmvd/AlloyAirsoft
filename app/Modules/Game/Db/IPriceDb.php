<?php

namespace App\Modules\Game\Db;

interface IPriceDb
{
    const TABLE = 'prices';

    public function getPricesByGameId(int $id): array;
}
