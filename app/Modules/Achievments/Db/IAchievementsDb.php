<?php

namespace App\Modules\Achievments\Db;

interface IAchievementsDb
{
    const TABLE = 'achievements';

    public function getAllAchievements(): array;

    public function getCountAchievements(): int;
}
