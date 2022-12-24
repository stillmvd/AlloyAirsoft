<?php

namespace App\Actions\PlayerActions;

use App\Models\Game;
use App\Models\Player;
use App\Models\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SetPriceForPlayerAction
{
    public function handle(Request $request, string $gameName): void
    {
        $user = Auth::user();
        $player = Player::find($user->player_id);
        $pricesForGame = Price::getPriceFromIdGame(Game::getIdByName($gameName));
        $playerPriceSelected = $request->all();
        $playerPriceFinale = 100;

        foreach ($pricesForGame as $pricesSelected)
        {
            if (array_key_exists($pricesSelected->name, $playerPriceSelected))
            {
                if ($playerPriceSelected[$pricesSelected->name] === 'on')
                {
                    $playerPriceFinale += $pricesSelected->price;
                }
            }
        }

        $player->update([
            'price' => $playerPriceFinale . '$ - ' . $gameName,
        ]);

        Game::attach(Game::getIdByName($gameName), $player->id);
    }
}
