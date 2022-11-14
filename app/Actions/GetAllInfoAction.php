<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GetAllInfoAction
{
    public function get(){
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
