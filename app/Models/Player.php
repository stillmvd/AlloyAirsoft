<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Player extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'id', 'team_id',
        'name', 'surname', 'callsign',
        'emailPlayer', 'phone', 'price'
    ];

    public function games()
    {
        return $this->belongsToMany(Game::class);
    }

    public function achievements()
    {
        return $this->belongsToMany(Achievement::class);
    }
}
