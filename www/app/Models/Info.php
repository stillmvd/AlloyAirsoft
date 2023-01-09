<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'title',
        'text',
    ];

    /**
     * Возращает инфо игры
     *
     * @param int $gameId Id игры
     *
     * @return array
     */
    public static function getInfosByGameId(int $gameId)
    {
        return Info::where('game_id', $gameId)->get()->first();
    }
}
