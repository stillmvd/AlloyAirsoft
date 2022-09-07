<?php

namespace App\Actions;

use App\Http\Requests\UpdatePlayerRequest;
use Illuminate\Support\Facades\DB;

class UpdatePlayerAction
{
    /**
     * Обновляет
     *
     * @param App\Http\Request\UpdatePlayerRequest $request
     * @return
     */
    public function update(UpdatePlayerRequest $request)
    {
        DB::table('players')->where('id', 1001)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'emailPlayer' => $request->emailPlayer,
            'phone' => $request->phone,
            'team_id' => $request->team_id,
        ]);
    }
}
