<?php

namespace App\Modules\Game\Db;

use Illuminate\Support\Facades\DB;

final class RuleDb implements IRuleDb
{
    public function getRulesByGameId(int $id): array
    {
        return DB::table(self::TABLE)->where('game_id', $id)->get()->toArray();
    }
}
