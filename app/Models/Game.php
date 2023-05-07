<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Game extends Model
{
    protected $fillable = [
        'date',
        'name',
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

    public static function getGames()
    {
        return self::get();
    }

    public static function getFinishedGames()
    {
        return self::where('finished', '1')->get();
    }

    public static function getCountGames(): int
    {
        return self::get()->count();
    }

    /**
     * По заданому имени игры возращает id игры
     *
     * @param string $gameName Имя игры
     *
     * @return int
     */
    public static function getIdByName(string $gameName)
    {
        return self::where('name', $gameName)->get()[0]->id;
    }

    /**
     * Проверяет есть ли игра по имени
     *
     * @param  string $gameName
     * @return bool
     */
    public static function hasGame(string $gameName)
    {
        if (self::where('name', $gameName)->count() >= 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    /**
     * Возращает имя игры по id
     *
     * @param int $gameId id игры
     *
     * @return string
     */
    public static function getNameById(int $gameId)
    {
        return self::find($gameId)->name;
    }

    /**
     * Привязывает игрока к игре
     *
     * @param int $gameId id игры
     * @param int $playerId id игрока
     *
     * @return void
     */
    public static function attach(int $gameId, int $playerId)
    {
        if (DB::table('game_player')->where('player_id', $playerId)
            ->where('game_id', $gameId)->count() <= 0)
        {
            self::find($gameId)->players()->attach($playerId);
        }
    }
}
