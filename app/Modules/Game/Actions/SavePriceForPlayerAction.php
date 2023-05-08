<?php

namespace App\Modules\Game\Actions;

use App\Models\Game;
use App\Models\Player;
use App\Modules\Player\Db\IPlayerPriceDb;
use Illuminate\Support\Facades\Auth;

final class SavePriceForPlayerAction
{
    private IPlayerPriceDb $playerPriceDb;

    public function __construct(IPlayerPriceDb $playerPriceDb)
    {
        $this->playerPriceDb = $playerPriceDb;
    }

    public function execute(array $data, string $gameName): void
    {
        //Эту магию тоже не забыть переписать
        $user = Auth::user();
        $player = Player::find($user->player_id);

        //Тоже пока костыль надо переделывать
        $player->update([
            'price' => '100' . '$',
        ]);

        $this->playerPriceDb->setPricesForPlayer($data);
        Game::attach(Game::getIdByName($gameName), $player->id);
    }

}
