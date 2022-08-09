<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'login', 'email', 'first_name', 'second_name', 'isActive', 'isAdmin'];

    public function users() {
        return $this->belongsToMany(Game::class);
    }
}
