<?php

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
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
        if($title != NULL || $text != NULL)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
if (! function_exists('priceExists'))
{
    /**
     * Проверяет существует ли price
     *
     * @return bool
     */
    function priceExists($title, $price)
    {
        if($title != NULL || $price != NULL)
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

if (! function_exists('hasAchievement'))
{
    function hasAchievement(int $id, string $name)
    {
        for ($i = 0; $i < count(Player::find($id)->achievements); $i++)
        {
            if (Player::find($id)->achievements[$i]->nameAchievement == $name)
            {
                return true;
            }
        }
        return false;
    }
}

if (! function_exists('leaderTeam'))
{
    function leaderTeam($id)
    {
        $teams = Team::getTeams();
        for ($i = 0; $i < count($teams); $i++)
        {
            if($id === (int)$teams[$i]->leader_id) return true;
        }
        return false;
    }
}

if (! function_exists('fillPlayer'))
{
    function fillPlayer()
    {
        $player = Auth::user()->player === NULL ? NULL : Auth::user()->player;

        if (
            $player->name != NULL &&
            $player->surname != NULL &&
            $player->callsign != NULL &&
            $player->phone != NULL
        )
        {
            return true;
        }
        else return false;
    }
}

if (! function_exists('getIp')) {
    function getIp(): ?string
    {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip);
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip();
    }
}

if (! function_exists('createNewToken')) {

    function createNewToken($token, bool $isJson = false): \Illuminate\Http\RedirectResponse|JsonResponse
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'user' => auth()->user()
        ];
        return $isJson ? response()->json($data) : redirect()->route('personal_account')->with($data);
    }

}
