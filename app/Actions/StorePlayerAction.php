<?php
namespace App\Actions;

use App\Http\Requests\StoreFormRequest;
use App\Models\Player;
use Illuminate\Foundation\Bus\DispatchesJobs;

class StorePlayerAction
{
    use DispatchesJobs;

    public function save(StoreFormRequest $request, $game_id): void
    {
        Player::create([
            'created_at' => now(),
            'game_id' => $game_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'email' => $request->email,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
    }
}
