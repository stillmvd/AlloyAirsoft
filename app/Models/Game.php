<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'first_cord',
        'second_cord',
        'polygon',
        'info',
        'game_info',
        'description_id',
        'playtime',
        'levels',
        'tags_icon',
        'finished',
    ];

    use HasFactory;
    public function games() {
        return $this->belongsToMany(User::class);
    }
}
