<?php

namespace App\Modules\Game\Db;

interface IPriceDb
{
    const TABLE = 'prices';

    public function getPricesByGameId(int $id): array;

    public function getNamesPriceByGameId(int $id): array;

    public function getIdByName(string $name): ?int;
}
