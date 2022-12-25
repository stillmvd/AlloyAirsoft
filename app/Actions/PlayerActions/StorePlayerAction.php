<?php
namespace App\Actions\PlayerActions;

use App\Http\Requests\StoreFormRequest;
use App\Models\Game;
use App\Models\Player;

class StorePlayerAction
{
    /**
     * Создает запись в базе данных Players и заносит туда данные из request и привязывает игрока к игре
     *
     * @param App\Http\Requests\StoreFormRequest $request
     * @param int $gameId id игры
     * @return void
     */
    public function handle(StoreFormRequest $request, int $gameId)
    {
        $player = new Player([
            'created_at' => now(),
            'game_id' => $gameId,
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'emailPlayer' => $request->emailPlayer,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
        $player->save();

        Game::attach($gameId, $player->id);
    }
}
