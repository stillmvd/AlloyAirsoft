<?php

namespace App\Actions\AdminActions;

use App\Models\Game;
use Illuminate\Http\Request;

class UpdateGameAction
{
    /**
     * Обновляет данные в базе games из полученного request-а
     *
     * @param Request $request
     * @param int $gameId id игры
     * @return object
     */
    public function handle(Request $request, int $gameId): object
    {
        $game = Game::find($gameId);

        Game::where('id', $game->id)->update([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'info' => request('info'),
            'time' => $request->input('time'),
            'polygon' => $request->input('polygon'),
            'first_cord' => $request->input('first_cord'),
            'second_cord' => $request->input('second_cord'),
            'levels' => $request->input('levels'),
            'finished' => 0,
        ]);

        return $game;
    }
}

