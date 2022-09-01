<?php
namespace App\Actions;

use Illuminate\Support\Facades\DB;

class GetUpcomingGamesAction
{
    /**
     * Возвращает из базы данных игры которые не завершены
     *
     * @return array
     */
    public function getGames()
    {
        return [
            'games' => DB::table('games')->where('finished', '=', '0')->get(),
            'number' => DB::table('games')->get()->count(),
            'phone' => DB::table('contact')->pluck('phone')[0],
            'email' => DB::table('contact')->pluck('email')[0],
        ];
    }
}
