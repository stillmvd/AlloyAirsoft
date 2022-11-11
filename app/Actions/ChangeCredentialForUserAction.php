<?php

namespace App\Actions;

use App\Http\Requests\StoreCredentialForUserRequest;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChangeCredentialForUserAction
{
    public function change(StoreCredentialForUserRequest $request)
    {
        DB::table('players')->where('id', Auth::user()->player_id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'phone' => $request->phone,
        ]);
    }
}
