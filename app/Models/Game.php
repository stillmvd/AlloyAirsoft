<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'date',
        'name',
        'info',
        'info',
        'polygon',
        'linkForIframe',
        'linkForGoogle',
        'levels',
        'time',
        'tags-icon',
        'finished',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }
}
