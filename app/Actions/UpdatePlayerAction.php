<?php

namespace App\Actions;

use App\Http\Requests\StoreFormRequest;
use Illuminate\Support\Facades\DB;

class UpdatePlayerAction
{
    /**
     * Обновляет
     *
     * @param App\Http\Request\StoreFormRequest $request
     * @return
     */
    public function update(StoreFormRequest $request)
    {
        DB::table('players')->where('id', 1001)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'emailPlayer' => $request->email,
            'phone' => $request->phone,
            'team_id' => $request->team_id,
        ]);
    }
}
