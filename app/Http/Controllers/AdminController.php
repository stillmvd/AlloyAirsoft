<?php

namespace App\Http\Controllers;

use App\Actions\MainActions\DeleteAllDataAction;
use App\Actions\MainActions\GetAllInfoAction;

use App\Actions\AdminActions\UpdateContactAction;
use App\Actions\AdminActions\StoreRulesGameAction;
use App\Actions\AdminActions\StoreInfosGameAction;
use App\Actions\AdminActions\StoreGameAction;
use App\Actions\AdminActions\GetInfoFromEditGameAction;
use App\Actions\AdminActions\UpdateGameAction;
use App\Actions\AdminActions\UpdateInfosAction;
use App\Actions\AdminActions\UpdatePasswordAction;
use App\Actions\AdminActions\UpdateRulesAction;
use App\Actions\AdminActions\GetAdminInfoAction;
use App\Actions\AdminActions\StorePricesGameAction;
use App\Actions\UserActions\GetAllInfoUserAction;
use App\Actions\UserActions\DeleteUserAction;

use App\Actions\PlayerActions\GetAchievementsAction;
use App\Actions\PlayerActions\DeletePlayerAction;
use App\Actions\PlayerActions\UpdatePlayerAction;

use App\Http\Requests\StoreContactInformation;
use App\Http\Requests\UpdatePlayerRequest;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/** AdminController содержит основные контроллеры работающие в админке. */
class AdminController extends Controller
{
    /**
     * Логин
     *
     * @return View
     */
    public function login() : View
    {
        return view('admin.login');
    }

    /**
     * Login для админа
     *
     * @param Request $request
     * @return RedirectResponse Возвращает главную страничку админки
     */
    public function login_store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($validated)) return redirect()->route('admin');
        else return redirect()->back()->withErrors([
            'loginError' => 'You have some errors'
        ]);
    }

    /**
     * Выхдит из админки
     *
     * @return RedirectResponse Редирект на главную страничку
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('index');
    }

    /**
     * Отображает главную страничку админки
     *
     * @param GetAdminInfoAction $getAdminInfo Получает информацию для админки
     *
     * @return View
     */
    public function index(GetAdminInfoAction $getAdminInfo): View
    {
        return view('admin.index', $getAdminInfo->handle());
    }

    /**
     * Отображает страницу изменения данных
     *
     * @param GetAdminInfoAction $getAdminInfo Получает информацию для админки
     *
     * @return View
     */
    public function credential(GetAdminInfoAction $getAdminInfo): View
    {
        return view('admin.credential', $getAdminInfo->handle());
    }

    /**
     * Создает игру
     *
     * @param Request $request
     * @param StoreGameAction $storeGame Сохраняет игру в базе данных данными из request-a
     * @param StoreInfosGameAction $storeInfosGame Сохраняет информацию об игре в базе данных данными из request-a
     * @param StoreRulesGameAction $storeRulesGame Сохраняет правила игры в базе данных данными из request-a
     * @param StorePricesGameAction $storePricesGame
     * @return RedirectResponse
     */
     public function create(Request $request, StoreGameAction $storeGame,
                            StoreInfosGameAction $storeInfosGame, StoreRulesGameAction $storeRulesGame,
                            StorePricesGameAction $storePricesGame): RedirectResponse
     {
        $game = $storeGame->handle($request);
        $storeInfosGame->handle($request, $game->id);
        $storeRulesGame->handle($request, $request->input('rulesCount'), $game->id);
        $storePricesGame->handle($request, $request->input('pricesCount'), $game->id);
        return redirect()->route('index')->with([
            'success' => 'The game "' . $game->name . '" was successfully created',
        ]);
    }

    /**
     * Возращает страничку редактирования игры
     *
     * @param int $gameId ID игры
     * @param GetInfoFromEditGameAction $getInfoFromEditGame Получает данные игры для их редактирования
     *
     * @return View
     */
    public function edit(int $gameId, GetInfoFromEditGameAction $getInfoFromEditGame): View
    {
        return view('admin.edit', $getInfoFromEditGame->handle($gameId));
    }

    /**
     * Обновляет информацию об игре
     *
     * @param Request $request
     * @param int $gameId ID игры
     * @param UpdateGameAction $updateGame Обновляет игру в базе данных
     * @param UpdateInfosAction $updateInfos Обновляет информацию об игре в базе данных
     * @param UpdateRulesAction $updateRules Обновляет правила игры в базе данных
     *
     * @return RedirectResponse
     */
    public function update(Request $request, int $gameId,
                           UpdateGameAction $updateGame, UpdateInfosAction $updateInfos, UpdateRulesAction $updateRules): RedirectResponse
    {
        $updateGame->handle($request, $gameId);
        $updateInfos->handle($gameId);
        $updateRules->handle($request, $request->input('count'), $gameId);
        return redirect()->route('game', $request->input('name'))->with([
            'success' => 'The information for "' . $request->input('name') . '" was updated',
        ]);
    }

    /**
     * Удаляет игру
     *
     * @param int $gameId ID игры
     * @param DeleteAllDataAction $deleteAllData Удаляет данные об игре
     *
     * @return RedirectResponse
     */
    public function delete(int $gameId, DeleteAllDataAction $deleteAllData) : RedirectResponse
    {
        $gameName = getNameGame($gameId);
        $deleteAllData->handle($gameId);

        return redirect('/')->with([
            'success' => 'The game "' . $gameName . '" was deleted',
        ]);
    }

    /**
     * Возращает страничку players
     *
     * @param GetAllInfoAction $getAllInfo Получает все данные из базы данных
     *
     * @return View
     */
    public function players(GetAllInfoAction $getAllInfo): View
    {
        return view('admin.players', $getAllInfo->get());
    }

    /**
     * Возращает страничку users
     *
     * @param GetAllInfoUserAction $getAllInfoUser Получает все данные из базы данных о юзере
     *
     * @return View
     */
    public function users(GetAllInfoUserAction $getAllInfoUser): View
    {
        return view('admin.users', $getAllInfoUser->handle());
    }

    /**
     *  Изменяет контактную информацию admin-а
     *
     * @param StoreContactInformation $request
     * @param UpdateContactAction $updateContact Обновляет контактные данные
     *
     * @return RedirectResponse
     */
    public function contactInformation(StoreContactInformation $request, UpdateContactAction $updateContact): RedirectResponse
    {
        $updateContact->update($request);
        return redirect()->route('credential')->with([
            'success' => 'Your contact information was updated',
        ]);
    }

    /**
     * Изменяет игровую информацию admin-а
     *
     * @param UpdatePlayerRequest $request
     * @param UpdatePlayerAction $updatePlayer Обновляет игровые данные admin-а
     *
     * @return RedirectResponse
     */
    public function playerInformation(UpdatePlayerRequest $request, UpdatePlayerAction $updatePlayer): RedirectResponse
    {
        $updatePlayer->handle($request);
        return redirect()->route('credential')->with([
            'success' => 'Your game information was updated',
        ]);
    }

    /**
     * Обновляет пароль
     *
     * @param Request $request
     * @param UpdatePasswordAction $updatePassword Обновляет пароль
     *
     * @return RedirectResponse
     */
    public function adminInformation(Request $request, UpdatePasswordAction $updatePassword): RedirectResponse
    {
        if ($updatePassword->update($request)) return redirect()->route('credential')->with([
                'success' => 'Password was changed',
            ]);
        else return redirect()->route('credential')->with([
                'error' => 'Incorrect password for ' . User::where('id', auth()->id())->get()->value('email'),
            ]);
    }

    /**
     * Удаляет playera по id
     *
     * @param int $playerId id playera
     * @param DeletePlayerAction $deletePlayer Удаляет игрока по id из базы данных players
     *
     * @return RedirectResponse
     */
    public function deletePlayer(int $playerId, DeletePlayerAction $deletePlayer): RedirectResponse
    {
        return redirect()->route('players')->with([
            'success' => 'Players "' . $deletePlayer->handle($playerId) . '" was successfully deleted'
        ]);
    }

    /**
     * Удаляет Usera по id
     *
     * @param int $userId
     * @param DeleteUserAction $deleteUser Удаляет юзера по id из базы данных users
     *
     * @return RedirectResponse
     */
    public function deleteUser(int $userId, DeleteUserAction $deleteUser): RedirectResponse
    {
        return redirect()->route('users')->with([
            'success' => 'User "' . $deleteUser->handle($userId) . '" was successfully deleted'
        ]);
    }

    /**
     * Добавляет и убирает очивки у игроков
     *
     * @param int $idPlayer id игрока
     * @param Request $request
     * @param GetAchievementsAction $getAchievements Добавляет и убирает очивки
     *
     * @return RedirectResponse
     */
    public function getAchievements(int $idPlayer, Request $request, GetAchievementsAction $getAchievements): RedirectResponse
    {
        $getAchievements->handle($request, $idPlayer);
        return redirect()->back();
    }
}
