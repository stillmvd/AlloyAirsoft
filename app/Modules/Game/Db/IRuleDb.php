<?php

namespace App\Modules\Game\Db;

interface IRuleDb
{
    const TABLE = 'rules';

    public function getRulesByGameId(int $id): array;
}
