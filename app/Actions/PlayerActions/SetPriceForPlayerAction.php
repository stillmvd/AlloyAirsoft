<?php

namespace App\Actions\PlayerActions;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetPriceForPlayerAction
{
    public function handle(Request $request, string $gameName)
    {
        $user = Auth::user();
        $player = Player::find($user->player_id);
        $playerPriceSelected = $request->all();

        $player->update([
            'price' => $playerPriceSelected['price'] . '$',
        ]);

        Game::attach(Game::getIdByName($gameName), $player->id);
    }
}
