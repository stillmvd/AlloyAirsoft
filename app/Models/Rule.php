<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $gameId)
 */
class Rule extends Model
{
    protected $fillable = [
        'title',
        'text',
    ];

    /**
     * Возращает правила игры
     *
     * @param int $gameId Id игры
     *
     * @return array
     */
    public static function getRulesByGameId(int $gameId): array
    {
        return self::where('game_id', $gameId)->get();
    }
}
