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

    public static function getInfosByGameId(int $gameId)
    {
        return self::where('game_id', $gameId)->get()->first();
    }
}
