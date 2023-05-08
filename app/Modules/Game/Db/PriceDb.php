<?php

namespace App\Modules\Game\Db;

use Illuminate\Support\Facades\DB;

final class PriceDb implements IPriceDb
{
    public function getPricesByGameId(int $id): array
    {
        return DB::table(self::TABLE)->where('game_id', $id)->get()->toArray();
    }

}
