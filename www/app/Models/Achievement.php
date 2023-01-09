<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'nameAchievement', 'description', 'pathToachievement',
    ];

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function test()
    {
        return 'test';
    }

}
