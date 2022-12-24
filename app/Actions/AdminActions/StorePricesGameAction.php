<?php

namespace App\Actions\AdminActions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StorePricesGameAction
{
    /**
     * Сохраняет прайсы в prices для game c gameId
     *
     * @param Illuminate\Http\Request $request
     * @param int $count Количество правил
     * @param int $gameId Id Игры
     * @return void
     */
    public function handle(Request $request, int $count, int $gameId)
    {
        if ($count <= 1)
        {
            DB::table('prices')->insert([
                'name' => $request->input('mainPrice'),
                'price' => $request->input('serviceName'),
                'game_id' => $gameId,
            ]);
        }
        else
        {
            for($i = 0; $i < $count; $i++)
            {
                $titlePrices = $request->input('mainPrice' . $i);
                $textPrices = $request->input('serviceName' . $i);
                if (priceExists($titlePrices, $textPrices))
                {
                    DB::table('prices')->insert([
                        'name' => $titlePrices,
                        'price' => $textPrices,
                        'game_id' => $gameId,
                    ]);
                }
            }
        }
    }
}
