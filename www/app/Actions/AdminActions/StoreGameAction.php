<?php
namespace App\Actions\AdminActions;

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
    public function handle(Request $request)
    {
        return Game::create([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'time' => $request->input('time'),
            'polygon' => $request->input('polygon'),
            'linkForIframe' => $request->input('linkForIframe'),
            'linkForGoogle' => $request->input('linkForGoogle'),
            'finished' => 0,
        ]);;
    }
}
