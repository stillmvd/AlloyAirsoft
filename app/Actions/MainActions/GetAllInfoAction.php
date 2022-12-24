<?php

namespace App\Actions\MainActions;

class GetAllInfoAction
{
    public function get(): array
    {
        return [
            'teams' => getAllDataOfTable('teams'),
            'games' => getAllDataOfTable('games'),

            'players' => getAllDataOfTable('players'),
            'players_count' => getCountRecordOfTable('players'),

            'emails' => getAllDataOfTable('emails'),
            'emails_count' => getCountRecordOfTable('emails'),

            'achievements' => getAllDataOfTable('achievements'),
            'achievements_count' => getCountRecordOfTable('achievements'),

        ];
    }
}
