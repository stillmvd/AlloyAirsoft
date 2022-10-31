<?php

namespace App\Actions;

use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUsersAction
{
    public function store(StoreUsersRequest $request)
    {
        DB::table('users')->insert([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'isActive' => true,
            'isAdmin' => false,
        ]);
    }
}
