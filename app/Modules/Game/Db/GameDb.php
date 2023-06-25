<?php

namespace App\Modules\Game\Db;

use Illuminate\Support\Facades\DB;

final class GameDb implements IGameDb
{
    public function getAllGames(): array
    {
        return DB::table(self::TABLE)
            ->get()
            ->toArray();
    }

    public function getFinishedGames(): array
    {
        return DB::table(self::TABLE)
            ->where('finished', 1)
            ->get()
            ->toArray();
    }

    public function getNearbyGames(): array
    {
        return DB::table(self::TABLE)
            ->where('finished', 0)
            ->get()
            ->toArray();
    }

    public function getCountFinishedGames(): int
    {
        return DB::table(self::TABLE)
            ->where('finished', 0)
            ->get()
            ->count();
    }
}
