<?php

namespace App\Actions\PlayerActions;

use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Player;


class UpdatePlayerAction
{
    /**
     * Обновляет
     *
     * @param App\Http\Request\UpdatePlayerRequest $request
     * @return
     */
    public function handle(UpdatePlayerRequest $request)
    {
        Player::find(1001)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'emailPlayer' => $request->emailPlayer,
            'phone' => $request->phone,
            'team_id' => $request->team_id,
        ]);
    }
}
