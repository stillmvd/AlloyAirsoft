<?php

namespace App\Modules\Team\Db;

use Illuminate\Support\Facades\DB;

interface ITeamDb
{
    const TABLE = 'teams';

    public function getAllTeams(): array;

    public function getCountTeams(): int;
}
