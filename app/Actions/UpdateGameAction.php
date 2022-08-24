<?php

namespace App\Actions;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

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
    public function update(Request $request, int $gameId){
        $game = Game::find($gameId);
        DB::table('games')->where('id', $game->id)->update([
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

