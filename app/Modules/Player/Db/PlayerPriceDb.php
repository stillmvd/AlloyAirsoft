<?php

namespace App\Modules\Player\Db;

use Illuminate\Support\Facades\DB;

final class PlayerPriceDb implements IPlayerPriceDb
{
    public function setPricesForPlayer(array $data): void
    {
        foreach ($data as $el) {
            DB::table(self::TABLE)
                ->insert([
                    'player_id' => $el['player_id'],
                    'prices_id' => $el['prices_id']
                ]);
        }
    }

}
