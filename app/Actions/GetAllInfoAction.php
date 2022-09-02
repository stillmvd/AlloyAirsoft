<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GetAllInfoAction
{
    public function get(){
        return [
            'players' => getAllDataOfTable('players'),
            'players_count' => getCountRecordOfTable('players'),

            'emails' => getAllDataOfTable('emails'),
            'emails_count' => getCountRecordOfTable('emails'),
        ];
    }
}
