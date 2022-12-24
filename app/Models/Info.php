<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $gameId)
 */
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
    public static function getInfosByGameId(int $gameId): array
    {
        return self::where('game_id', $gameId)->get()->first();
    }
}
