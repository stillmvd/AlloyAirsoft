<?php
namespace App\Actions;

use App\Models\Game;

use Illuminate\Http\Request;

class StoreGameAction
{
    /**
     * Заносит данные в таблиу games
     *
     * @param Illuminate\Http\Request $request
     * @return object
     */
    public function saveGame(Request $request)
    {
        return Game::create([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'info' => $request->input('info'),
            'time' => $request->input('time'),
            'polygon' => $request->input('polygon'),
            'first_cord' => $request->input('first_cord'),
            'second_cord' => $request->input('second_cord'),
            'levels' => $request->input('levels'),
            'finished' => 0,
        ]);;
    }
}
