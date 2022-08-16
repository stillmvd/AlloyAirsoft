<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'date',
        'name',
        'info',
        'info',
        'polygon',
        'first_cord',
        'second_cord',
        'levels',
        'time',
        'tags-icon',
        'finished',
    ];

    use HasFactory;
    public function games() {
        return $this->belongsToMany(User::class);
    }
}
