<?php
namespace App\Actions\MainActions;

use App\Models\Main\Game;
use Illuminate\Support\Facades\DB;

class GetGamesAction
{
    /**
     * Возвращает из базы данных все игры
     *
     * @return array
     */
    public function handle()
    {
        $data = [
            'games' => Game::getGames(),
            'games_count' => Game::getCountGames(),
            'phone' => DB::table('contact')->pluck('phone')[0],
            'email' => DB::table('contact')->pluck('email')[0],
        ];

        return $data;
    }
}
