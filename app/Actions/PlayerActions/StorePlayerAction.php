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
     * @param StoreFormRequest $request
     * @param int $gameId id игры
     * @return void
     */
    public function handle(StoreFormRequest $request, int $gameId)
    {
        $player = new Player([
            'created_at' => now(),
            'game_id' => $gameId,
            'name' => $request->input('name'),
            'surname' => $request->input('surname'),
            'callsign' => $request->input('callsign'),
            'emailPlayer' => $request->input('emailPlayer'),
            'phone' => $request->input('phone'),
            'team_id' =>  $request->input('team_id'),
        ]);
        $player->save();

        Game::attach($gameId, $player->id);
    }
}
