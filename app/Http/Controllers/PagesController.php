<?php

namespace App\Http\Controllers;

use App\Actions\UserActions\GetInfoForAccountAction;

use App\Actions\MainActions\GetArchiveGamesAction;
use App\Actions\MainActions\GetGameInfoAction;
use App\Actions\MainActions\GetUpcomingGamesAction;
use App\Actions\MainActions\SendEmailAction;
use App\Actions\MainActions\StoreEmailAction;

use App\Actions\MainActions\getOldDataOfPlayer;
use App\Actions\PlayerActions\StorePlayerAction;
use App\Actions\PlayerActions\storePlayerWithoutRegistarionAction;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreFormRequest;

use App\Models\Game;
use Illuminate\Support\Facades\Auth;

/** PagesController содержит основные контроллеры работающие на сайте. */
class PagesController extends Controller
{
    /**
     * Возвращает главную страницу сайта
     *
     * @param App\Actions\GetGamesAction $getGames Получает из actiona игры которые не завершились
     * @return \Illuminate\View\View
     */
    public function index(GetGamesAction $getGames)
    {
        return view('index', $getGames->handle());
    }

    /**
     * Возвращает страницу архивных игр
     *
     * @param App\Actions\GetArchiveGamesAction $getArchiveGames Получает из actiona игры которые завершились
     * @return \Illuminate\View\View
     */
    public function archive(GetArchiveGamesAction $getArchiveGames)
    {
        return view('archive', $getArchiveGames->handle());
    }

    /**
     * Возращает страницу самой игры
     *
     * @param App\Actions\GetGameInfoAction $getGameInfo Получает из actiona информацию об игре
     * @param string $gameName Имя игры
     * @return Illuminate\View\View
     */
    public function game(GetGameInfoAction $getGameInfo, string $gameName)
    {
        return view('game', $getGameInfo->handle($gameName));
    }

    /**
     * Возращаем страницу аккаунта пользователя по его id
     *
     * @param int $id
     * @param App\Actions\GetInfoForAccountAction $getInfoForAccount получаем данные игрока
     *
     * @return Illuminate\View\View
     */
    public function account(int $id, GetInfoForAccountAction $getInfoForAccount)
    {
        return view('personalAcount', $getInfoForAccount->handle($id));
    }

    /**
     * Сохраняет информацию об игроке и отправляет информацию о игре ему на почту
     *
     * @param  App\Http\Request\StoreFormRequest $request Получает данные об игроке после валидации из request-а
     * @param  int $gameId ID игры в которой игрок зарегистрировался
     * @param  App\Actions\getOldDataOfPlayer $getOldData При неправильном заполнении полей получаем значения из предыдущего запроса
     * @param  App\Actions\StorePlayerAction $storePlayer Сохраняем игрока
     * @param  App\Actions\SendEmailAction $sendEmail Отправляем ему сообщение об успешной регистрации
     * @return Illuminate\Redirect\ Редиректим на страницу игры
     */
    public function storePlayers(StoreFormRequest $request, int $gameId, getOldDataOfPlayer $getOldData,
                                  StorePlayerAction $storePlayer, SendEmailAction $sendEmail)
    {
        $gameName = Game::getNameById($gameId);
        $getOldData->handle($request);

        $storePlayer->handle($request, $gameId);
        $sendEmail->handle($request->emailPlayer,
                'Вы успешно заригистрировались на игру',
                'Вы успешно заригистрировались на игру');

        return redirect()->route('game', strtolower($gameName))->with(
            ['success' => 'You were registered for the game']
        );
    }

    /**
     * Сохраняем email для рассылки
     *
     * @param  App\Http\Requset\StoreEmailRequest $request Получаем email для рассылки
     * @param  App\Actions\StoreEmailAction $storeEmail Сохраняем email
     * @param  App\Actions\SendEmailAction $sendEmail Отправляем сообщение
     * @return Illuminate\Redirect\ Редиректим на главную страницу
     */
    public function saveEmail(StoreEmailRequest $request,
                              StoreEmailAction $storeEmail, SendEmailAction $sendEmail)
    {
        $request->old('email');
        if(isExistsDB($request->email))
        {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        }
        else
        {
            $storeEmail->handle($request->email);
            $sendEmail->handle($request->email,
                    'Регистрация на игру',
                    'Вы успешно зарегистрировались на игру');

            return redirect()->back()->with(
                ['success' => 'You have been subscribed to the newsletter!']
            );
        }
    }

    /**
     * Регистрирует пользователя на игру если он уже есть как пользователь
     *
     * @param int $gameId id игры
     *
     * @return Illuminate\Redirect\
     */
    public function storePlayerWithoutRegistarion(int $gameId)
    {
        $storePlayer = new storePlayerWithoutRegistarionAction($gameId, Auth::user()->player->id);
        $storePlayer->handle();

        return redirect()->route('game', strtolower(Game::getNameById($gameId)));
    }
}
