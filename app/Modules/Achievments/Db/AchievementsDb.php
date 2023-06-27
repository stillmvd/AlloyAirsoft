<?php

namespace App\Modules\Achievments\Db;

use Illuminate\Support\Facades\DB;

final class AchievementsDb implements IAchievementsDb
{
    public function getAllAchievements(): array
    {
        return DB::table(self::TABLE)
            ->get()
            ->toArray();
    }

    public function getCountAchievements(): int
    {
        return DB::table(self::TABLE)
            ->get()
            ->count();
    }
}
