<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'game_id',
    ];

    static function getPriceFromIdGame(int $id)
    {
        return self::get()->where('game_id', $id);
    }
}
