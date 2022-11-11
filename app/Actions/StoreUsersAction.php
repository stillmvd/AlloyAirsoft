<?php

namespace App\Actions;

use App\Http\Requests\StoreUsersRequest;
use App\Models\Player;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StoreUsersAction
{
    public function store(StoreUsersRequest $request)
    {
        $player = new Player([
            'emailPlayer' => $request->emailPlayerForReg,
            'team_id' => '1002',
        ]);
        $player->save();

        $user = User::create([
            'email' => $request->emailPlayerForReg,
            'password' => Hash::make($request->passwordForReg),
            'isActive' => true,
            'isAdmin' => false,
            'player_id' => $player->id,
        ]);

        return $user;
    }
}
