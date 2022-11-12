<?php

use App\Models\Game;
use App\Models\Player;
use App\Models\User;
use Illuminate\Support\Facades\DB;

if (! function_exists('isExistsDB'))
{
    /**
     * Проверяет существует ли email в базе данных
     *
     * @param string $email
     * @return bool
     */
    function isExistsDB(string $email)
    {
        if(DB::table('emails')->where('email', $email)->exists())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
if (! function_exists('ruleExists'))
{
    /**
     * Проверяет существует ли правило
     *
     * @param string $title Заголовок правила
     * @param string $text Текст правила
     * @return bool
     */
    function ruleExists(string $title, string $text)
    {
        if($title != null || $text != null)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
if (! function_exists('getNameGame'))
{
    /**
     * Возвращает имя Игры
     *
     * @param int $gameId id игры
     * @return object
     */
    function getNameGame(int $gameId)
    {
        $game = Game::find($gameId);
        return $game->name;
    }
}
if (! function_exists('getAllDataOfTable'))
{
    /**
     * Возвращает все данные из таблицы
     *
     * @param int $nameTable Имя таблицы
     * @return object
     */
    function getAllDataOfTable(string $nameTable)
    {
        return DB::table($nameTable)->get();
    }
}

if (! function_exists('getCountRecordOfTable'))
{
    /**
     * Возвращает количество записей в таблице
     *
     * @param int $nameTable Имя таблицы
     * @return object
     */
    function getCountRecordOfTable(string $nameTable)
    {
        return DB::table($nameTable)->get()->count();
    }
}

if (! function_exists('userIsAdmin'))
{
    function userIsAdmin(int $id)
    {
        $user = User::find($id);
        if ($user->isAdmin == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

if (! function_exists('getGamesForPlayer'))
{
    function getGamesForPlayer(int $id)
    {
        $gamesPlayed = Player::find($id)->games;
        $games = '';
        for ($i = 0; $i < $gamesPlayed->count(); $i++)
        {
            if($gamesPlayed[$i] != NUll)
            {
                $games .= $gamesPlayed[$i]->name;
            }
        }
        return $games;
    }
}
