<?php

namespace App\Modules\Player\Db;

interface IPlayerPriceDb
{
    const TABLE = 'player_prices';

    public function setPricesForPlayer(array $data): void;
}
