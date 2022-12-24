<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, int $id)
 * @method static create(array $array)
 * @method static get()
 */
class Team extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'leader_id'];

    /**
     * Возращает команды на игру
     *
     */
    public static function getTeams()
    {
        return self::get();
    }

    /**
     * Возращает количество команд
     *
     * @return mixed
     */
    public static function getCountTeams()
    {
        return self::get()->count();
    }
}
