<?php

namespace App\Modules\Game\Request;

use App\Models\Game;
use App\Modules\Game\Db\IPriceDb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

final class RequestTransformer
{
    private IPriceDb $priceDb;
    private Game $gameModel;

    public function __construct(IPriceDb $priceDb, Game $gameModel)
    {
        $this->priceDb = $priceDb;
        $this->gameModel = $gameModel;
    }

    public function validateDataForRegisterInGame(Request $request, string $name): array
    {
        $pickPrices = $request->all();
        unset($pickPrices['_token']);
        $gameId = $this->gameModel::getIdByName($name);
        $allRules = $this->priceDb->getNamesPriceByGameId($gameId);

        if (!empty(array_diff($pickPrices, $allRules))) {
            return [];
        }

        $data = [];
        foreach ($pickPrices as $price) {
            $data[] = [
                //Потом переписать эту магию
                'player_id' => Auth::user()->player_id,
                'prices_id' => $this->priceDb->getIdByName($price),
            ];
        }

        return $data;
    }

}
