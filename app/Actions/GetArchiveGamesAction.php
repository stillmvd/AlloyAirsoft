<?php
namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GetArchiveGamesAction
{
    /**
     * Возвращает из базы данных игры которые завершены
     *
     * @return array
     */
    public function getGames()
    {
        return [
            'teams' => DB::table('teams')->get(),
            'number' => DB::table('games')->get()->count(),
            'games' => DB::table('games')->where('finished', 1)->get(),
        ];
    }
}
