<?php

namespace App\Actions\PlayerActions;

use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;


class UpdatePlayerAction
{
    /**
     * Обновляет
     *
     * @param UpdatePlayerRequest $request
     * @return void
     */
    public function handle(UpdatePlayerRequest $request): void
    {
        Player::find(1001)->update([
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'callsign' => $request->input('callsign'),
            'emailPlayer' => $request->input('emailPlayer'),
            'phone' => $request->input('phone'),
            'team_id' => $request->input('team_id'),
        ]);
    }
}
