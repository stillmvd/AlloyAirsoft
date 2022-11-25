<?php

namespace App\Actions;

use App\Http\Requests\StoreCredentialForUserRequest;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;

class ChangeCredentialForUserAction
{
    /**
     * Обновляет данные плеера
     *
     * @param StoreCredentialForUserRequest $request
     *
     * @return
     */
    public function handle(StoreCredentialForUserRequest $request)
    {
        Player::find(Auth::user()->player_id)->update([
            'name' => $request->namePlayer,
            'surname' => $request->surnamePlayer,
            'callsign' => $request->callsignPlayer,
            'phone' => $request->phonePlayer,
        ]);
    }
}
