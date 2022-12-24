<?php

namespace App\Actions\PlayerActions;

use App\Models\Achievement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetAchievementsAction
{
    /**
     * Добавляет и убирает очивки
     *
     * @param Request $request
     * @param int $idPlayer id игрока
     *
     * @return void
     */
    public function handle(Request $request, int $idPlayer): void
    {
        if ($request->input('Actor') == 'on')
        {
            if (DB::table('achievement_player')->where('achievement_id', 1)->where('player_id', $idPlayer)->count() == 0)
            {
                Achievement::find(1)->players()->attach($idPlayer);
            }
        }
        else
        {
            Achievement::find(1)->players()->detach($idPlayer);
        }
        if ($request->input('Spy') == 'on')
        {
            if (DB::table('achievement_player')->where('achievement_id', 2)->where('player_id', $idPlayer)->count() == 0)
            {
                Achievement::find(2)->players()->attach($idPlayer);
            }
        }
        else
        {
            Achievement::find(2)->players()->detach($idPlayer);
        }
        if ($request->input('Villain') == 'on')
        {
            if (DB::table('achievement_player')->where('achievement_id', 3)->where('player_id', $idPlayer)->count() == 0)
            {
                Achievement::find(3)->players()->attach($idPlayer);
            }
        }
        else
        {
            Achievement::find(3)->players()->detach($idPlayer);
        }
    }
}
