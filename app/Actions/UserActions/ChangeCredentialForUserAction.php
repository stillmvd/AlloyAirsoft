<?php

namespace App\Actions\UserActions;

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
     * @return void
     */
    public function handle(StoreCredentialForUserRequest $request): void
    {
        Player::find(Auth::user()->player_id)->update([
            'name' => $request->input('namePlayer'),
            'surname' => $request->input('surnamePlayer'),
            'callsign' => $request->input('callsignPlayer'),
            'phone' => $request->input('phonePlayer'),
        ]);
    }
}
