<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'leader_id'];

    /**
     * Возращает команды на игру
     *
     * @return array
     */
    public static function getTeams()
    {
        return Team::get();
    }

    /**
     * Возращает количество команд
     *
     * @return
     */
    public static function getCountTeams()
    {
        return Team::get()->count();
    }
}
