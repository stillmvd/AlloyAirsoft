<?php

namespace App\Http\Controllers;

use App\Actions\GetArchiveGamesAction;
use App\Actions\GetGameInfoAction;
use App\Actions\getOldDataOfPlayer;
use App\Actions\GetUpcomingGamesAction;
use App\Actions\SendEmailAction;
use App\Actions\StoreEmailAction;
use App\Actions\StorePlayerAction;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreFormRequest;

/** PagesController содержит основные контроллеры работающие на сайте. */
class PagesController extends Controller
{
    /**
     * Возвращает главную страницу сайта
     *
     * @param App\Actions\GetUpcomingGamesAction $getUpcomingGames Получает из actiona игры которые не завершились
     * @return \Illuminate\View\View
     */
    public function index(GetUpcomingGamesAction $getUpcomingGames)
    {
        return view('index', $getUpcomingGames->getGames());
    }

    /**
     * Возвращает страницу архивных игр
     *
     * @param App\Actions\GetArchiveGamesAction $getArchiveGames Получает из actiona игры которые завершились
     * @return \Illuminate\View\View
     */
    public function archive(GetArchiveGamesAction $getArchiveGames)
    {
        return view('archive', $getArchiveGames->getGames());
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
        return view('game', $getGameInfo->getInfo($gameName));
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
        $getOldData->getData($request);

        $storePlayer->createPlayerInDB($request, $gameId);
        $sendEmail->sendEmail($request->emailPlayer, 'Вы успешно заригистрировались на игру', 'Вы успешно заригистрировались на игру');

        return redirect()->route('game', $gameId)->with(
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
            $storeEmail->saveEmail($request->email);
            $sendEmail->sendEmail($request->email, 'Регистрация на игру', 'Вы успешно зарегистрировались на игру');

            return redirect()->back()->with(
                ['success' => 'You have been subscribed to the newsletter!']
            );
        }
    }
}
