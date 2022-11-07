<?php

namespace App\Actions;

use App\Http\Requests\StoreUsersRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUsersAction
{
    public function store(StoreUsersRequest $request)
    {
        $user = User::create([
            'email' => $request->emailPlayerForReg,
            'password' => Hash::make($request->passwordForReg),
            'isActive' => true,
            'isAdmin' => false,
        ]);

        return $user;
    }
}
