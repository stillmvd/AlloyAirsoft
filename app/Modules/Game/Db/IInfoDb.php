<?php

namespace App\Modules\Game\Db;

interface IInfoDb
{
    const TABLE = 'infos';

    public function getInfosByGameId(int $id): array;
}
