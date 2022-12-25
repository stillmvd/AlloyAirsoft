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
                'name' => $request->input('pricesTitle0'),
                'price' => $request->input('pricesText0'),
                'game_id' => $gameId,
            ]);
        }
        else
        {
            for($i = 0; $i < $count; $i++)
            {
                $titlePrices = $request->input('pricesTitle' . $i);
                $textPrices = $request->input('pricesText' . $i);
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
