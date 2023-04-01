<?php

use App\Models\Main\Game;
use Illuminate\Support\Facades\DB;

final class MainReaders
{
    /**
     * @throws Exception
     */
    public function getGamesForMainPage(): array
    {
        $games = Game::getGames();
        $gamesCount = Game::getCountGames();

        if (!$games || $gamesCount === 0) {
            throw new Exception('Error, not found any game');
        }

        return [
            'games' => $games,
            'gamesCount' => $gamesCount,
            'phone' => MainDataForSiteEnum::SITE_PHONE,
            'email' => MainDataForSiteEnum::SITE_EMAIL,
        ];
    }

}
