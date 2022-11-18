<?php
namespace App\Actions;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GetUpcomingGamesAction
{
    /**
     * Возвращает из базы данных игры которые не завершены
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            'games' => Game::getUpcomingGames(),
            'games_count' => Game::getCountGames(),
            'phone' => DB::table('contact')->pluck('phone')[0],
            'email' => DB::table('contact')->pluck('email')[0],
        ];

        return $data;
    }
}
