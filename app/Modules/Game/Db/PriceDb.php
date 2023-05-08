<?php

namespace App\Modules\Game\Db;

use Illuminate\Support\Facades\DB;

final class PriceDb implements IPriceDb
{
    public function getPricesByGameId(int $id): array
    {
        return DB::table(self::TABLE)->where('game_id', $id)->get()->toArray();
    }

    public function getNamesPriceByGameId(int $id): array
    {
        $resObj = DB::table(self::TABLE)
            ->select('name')
            ->where('game_id', $id)
            ->get()
            ->toArray();

        $res = [];
        foreach ($resObj as $obj) {
            $res[] = (array) $obj;
        }

        return array_column($res, 'name');
    }

    public function getIdByName(string $name): ?int
    {
        if ($name == '') {
            return null;
        }

        $res = DB::table(self::TABLE)
            ->select('id')
            ->where('name', $name)
            ->get()
            ->first();
        return (int) $res->id;
    }

}
