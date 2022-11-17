<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    public static function getRulesByGameId(int $gameId)
    {
        return Rule::where('game_id', $gameId)->get();
    }
}
