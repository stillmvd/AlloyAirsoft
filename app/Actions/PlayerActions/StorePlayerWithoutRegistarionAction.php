<?php

namespace App\Actions\PlayerActions;

use App\Models\Game;
use Illuminate\Support\Facades\DB;

class storePlayerWithoutRegistarionAction
{
    public function __construct(int $gameId, int $playerId)
    {
        $this->gameId = $gameId;
        $this->playerId = $playerId;
    }

    public function registerOnGame()
    {
        if (DB::table('game_player')->where('game_id', $this->gameId)->where('player_id', $this->playerId)->count() == 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function handle()
    {
        if ($this->registerOnGame())
        {
            Game::attach($this->gameId, $this->playerId);
        }
    }

}
