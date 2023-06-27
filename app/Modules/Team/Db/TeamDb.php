<?php

namespace App\Modules\Team\Db;

use Illuminate\Support\Facades\DB;

final class TeamDb implements ITeamDb
{
    public function getAllTeams(): array
    {
        return DB::table(self::TABLE)
            ->get()
            ->toArray();
    }

    public function getCountTeams(): int
    {
        return DB::table(self::TABLE)
            ->get()
            ->count();
    }
}
