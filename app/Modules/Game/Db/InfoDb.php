<?php

namespace App\Modules\Game\Db;

use Illuminate\Support\Facades\DB;

final class InfoDb implements IInfoDb
{
    public function getInfosByGameId(int $id): array
    {
        return DB::table(self::TABLE)
            ->select('*')
            ->where('game_id', $id)
            ->get()
            ->toArray();
    }
}
