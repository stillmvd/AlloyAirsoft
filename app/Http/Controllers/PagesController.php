<?php

namespace App\Http\Controllers;

use App\Actions\UserActions\GetInfoForAccountAction;

use App\Actions\MainActions\GetArchiveGamesAction;
use App\Actions\MainActions\GetGameInfoAction;
use App\Actions\MainActions\GetGamesAction;
use App\Actions\MainActions\SendEmailAction;
use App\Actions\MainActions\StoreEmailAction;

use App\Actions\MainActions\getOldDataOfPlayer;
use App\Actions\PlayerActions\SetPriceForPlayerAction;
use App\Actions\PlayerActions\StorePlayerAction;
use App\Actions\PlayerActions\StorePlayerWithoutRegistrationAction;

use App\Http\Controllers\Illuminate\Redirect\Редиректим;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreFormRequest;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/** PagesController содержит основные контроллеры работающие на сайте. */
class PagesController extends Controller
{
    /**
     * Возвращает главную страницу сайта
     *
     * @param GetGamesAction $getGames Получает из actiona игры которые не завершились
     * @return View
     */
    public function index(GetGamesAction $getGames): View
    {
        return view('index', $getGames->handle());
    }

    /**
     * Возвращает страницу архивных игр
     *
     * @param GetArchiveGamesAction $getArchiveGames Получает из actiona игры которые завершились
     * @return View
     */
    public function archive(GetArchiveGamesAction $getArchiveGames): View
    {
        return view('archive', $getArchiveGames->handle());
    }

    /**
     * Возращает страницу самой игры
     *
     * @param GetGameInfoAction $getGameInfo Получает из actiona информацию об игре
     * @param string $gameName Имя игры
     * @return View
     */
    public function game(GetGameInfoAction $getGameInfo, string $gameName) : View
    {
        return view('game', $getGameInfo->handle($gameName));
    }

    public function storePrice(string $gameName, Request $request, SetPriceForPlayerAction $setPriceForPlayer): RedirectResponse
    {
        $setPriceForPlayer->handle($request, $gameName);
        return redirect()->route('game', $gameName);
    }

    /**
     * Возращаем страницу аккаунта пользователя по его id
     *
     * @param int $id
     * @param GetInfoForAccountAction $getInfoForAccount получаем данные игрока
     *
     * @return View
     */
    public function account(int $id, GetInfoForAccountAction $getInfoForAccount): View
    {
        return view('personalAcount', $getInfoForAccount->handle($id));
    }

    /**
     * Сохраняет информацию об игроке и отправляет информацию о игре ему на почту
     *
     * @param StoreFormRequest $request Получает данные об игроке после валидации из request-а
     * @param int $gameId ID игры в которой игрок зарегистрировался
     * @param getOldDataOfPlayer $getOldData При неправильном заполнении полей получаем значения из предыдущего запроса
     * @param StorePlayerAction $storePlayer Сохраняем игрока
     * @param SendEmailAction $sendEmail Отправляем ему сообщение об успешной регистрации
     * @return RedirectResponse на страницу игры
     */
    public function storePlayers(StoreFormRequest $request, int $gameId, getOldDataOfPlayer $getOldData,
                                  StorePlayerAction $storePlayer, SendEmailAction $sendEmail): RedirectResponse
    {
        $gameName = Game::getNameById($gameId);
        $getOldData->handle($request);

        $storePlayer->handle($request, $gameId);
        $sendEmail->handle($request->input('emailPlayer'),
                'Вы успешно заригистрировались на игру',
                'Вы успешно заригистрировались на игру');

        return redirect()->route('game', strtolower($gameName))->with(
            ['success' => 'You were registered for the game']
        );
    }

    /**
     * Сохраняем email для рассылки
     *
     * @param StoreEmailRequest $request Получаем email для рассылки
     * @param StoreEmailAction $storeEmail Сохраняем email
     * @param SendEmailAction $sendEmail Отправляем сообщение
     * @return RedirectResponse на главную страницу
     */
    public function saveEmail(StoreEmailRequest $request,
                              StoreEmailAction $storeEmail, SendEmailAction $sendEmail): RedirectResponse
    {
        $request->old('email');
        if(isExistsDB($request->input('email')))
        {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        }
        else
        {
            $storeEmail->handle($request->input('email'));
            $sendEmail->handle($request->input('email'),
                    'Регистрация на игру',
                    'Вы успешно зарегистрировались на игру');

            return redirect()->back()->with(
                ['success' => 'You have been subscribed to the newsletter!']
            );
        }
    }

}
