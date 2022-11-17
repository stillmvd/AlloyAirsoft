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

    /**
     * Возращает не завершенные игры
     *
     * @return array
     */
    public static function getUpcomingGames()
    {
        return Game::where('finished', '0')->get();
    }

    /**
     * Возращает количество игр
     *
     * @return int
     */
    public static function getCountGames()
    {
        return Game::get()->count();
    }

    /**
     * Возращает завершенные игры
     *
     * @return array
     */
    public static function getFinishedGames()
    {
        return Game::where('finished', '1')->get();
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
        return Game::where('name', $gameName)->get()[0]->id;
    }

    /**
     * Проверяет есть ли игра по имени
     *
     * @param  string $gameName
     * @return bool
     */
    public static function hasGame(string $gameName)
    {
        if (Game::where('name', $gameName)->count() >= 1)
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
        return Game::find($gameId)->name;
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
        Game::find($gameId)->players()->attach($playerId);
    }
}
