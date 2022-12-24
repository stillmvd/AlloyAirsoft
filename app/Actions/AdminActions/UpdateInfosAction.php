<?php

namespace App\Actions\AdminActions;

use Illuminate\Support\Facades\DB;

class UpdateInfosAction
{
    /**
     * Обновляет info для игры
     *
     * @param int $gameId id игры
     * @return void
     */
    public function handle(int $gameId): void
    {
        DB::table('infos')->where('game_id', $gameId)->update([
            'title' => request('title'),
            'text' => request('text'),
            'game_id' => $gameId,
        ]);
    }
}
