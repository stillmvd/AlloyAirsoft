<?php

namespace App\Actions\UserActions;

use App\Models\User;

class GetAllInfoUserAction
{
    public function handle(): array
    {
        return [
            'users' => User::all(),
            'users_count' => getCountRecordOfTable('users'),

            'emails' => getAllDataOfTable('emails'),
            'emails_count' => getCountRecordOfTable('emails'),
        ];
    }
}
