<?php

namespace App\Actions\AdminActions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreInfosGameAction
{
    /**
     * Сохраняет в базу infos данные info для game c gameId
     *
     * @param Request $request
     * @param int $gameId id игры
     * @return void
     */
    public function handle(Request $request, int $gameId): void
    {
        DB::table('infos')->insert([
            'title' => $request->input('title'),
            'text' => $request->input('text'),
            'game_id' => $gameId,
        ]);
    }
}
