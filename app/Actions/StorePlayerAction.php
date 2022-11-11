<?php
namespace App\Actions;

use App\Http\Requests\StoreFormRequest;
use App\Models\Game;
use App\Models\Player;

class StorePlayerAction
{
    /**
     * Создает запись в базе данных Players и заносит туда данные из request
     *
     * @param App\Http\Requests\StoreFormRequest $request
     * @param int $game_id id игры
     * @return void
     */
    public function createPlayerInDB(StoreFormRequest $request, int $game_id)
    {
        $player = new Player([
            'created_at' => now(),
            'game_id' => $game_id,
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'emailPlayer' => $request->emailPlayer,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
        $player->save();
        Game::find($game_id)->players()->attach($player->id);
    }
}
