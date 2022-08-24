<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class UpdateInfosAction
{
    /**
     * Обновляет info для игры
     *
     * @param int $gameId id игры
     * @return void
     */
    public function update(int $gameId)
    {
        DB::table('infos')->where('id', $gameId)->update([
            'title' => request('title'),
            'text' => request('text'),
            'game_id' => $gameId,
        ]);
    }
}
