<?php

namespace App\Actions;

use App\Models\User;

class GetAllInfoUserAction
{
    public function get()
    {
        return [
            'users' => User::all(),
            'users_count' => getCountRecordOfTable('users'),

            'emails' => getAllDataOfTable('emails'),
            'emails_count' => getCountRecordOfTable('emails'),
        ];
    }
}
