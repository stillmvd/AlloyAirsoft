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
            'link' => $request->input('link'),
            'levels' => $request->input('levels'),
            'finished' => 0,
        ]);;
    }
}
