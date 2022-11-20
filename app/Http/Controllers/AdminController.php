<?php

namespace App\Http\Controllers;

use App\Actions\DeleteAllDataAction;
use App\Actions\DeletePlayerAction;
use App\Actions\DeleteUserAction;
use App\Actions\GetAchievementsAction;
use App\Actions\GetAdminInfoAction;
use App\Actions\GetAllInfoAction;
use App\Actions\GetAllInfoUserAction;
use App\Actions\GetInfoFromEditGameAction;
use App\Actions\StoreGameAction;
use App\Actions\StoreInfosGameAction;
use App\Actions\StoreRulesGameAction;
use App\Actions\UpdateContactAction;
use App\Actions\UpdateGameAction;
use App\Actions\UpdateInfosAction;
use App\Actions\UpdatePasswordAction;
use App\Actions\UpdatePlayerAction;
use App\Actions\UpdateRulesAction;

use App\Http\Requests\StoreContactInformation;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Achievement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/** AdminController содержит основные контроллеры работающие в админке. */
class AdminController extends Controller
{
    /**
     * Входит в аккаунт
     *
     * @return view
     */
    public function login()
    {
        return view('admin.login');
    }

    /**
     * Login для админа
     *
     * @param Request $request
     * @return \Illuminate\View\View Возвращает главную страничку админки
     */
    public function login_store(Request $request)
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
     * @return \Illuminate\Redirect Редирект на главную страничку
     */
    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }

    /**
     * Отображает главную страничку админки
     *
     * @param App\Actions\getAdminInfoAction $getAdminInfo Получает информацию для админки
     *
     * @return \Illuminate\View\View
     */
    public function index(GetAdminInfoAction $getAdminInfo)
    {
        return view('admin.index', $getAdminInfo->handle());
    }

    /**
     * Отображает страницу изменения данных
     *
     * @param App\Actions\getAdminInfoAction $getAdminInfo Получает информацию для админки
     *
     * @return \Illuminate\View\View
     */
    public function credential(GetAdminInfoAction $getAdminInfo)
    {
        return view('admin.credential', $getAdminInfo->handle());
    }

    /**
     * Создает игру
     *
     * @param Request $request
     * @param App\Actions\StoreGameAction $storeGame Сохраняет игру в базе данных данными из request-a
     * @param App\Actions\StoreInfosGameAction $storeInfosGame Сохраняет информацию об игре в базе данных данными из request-a
     * @param App\Actions\StoreRulesGameAction $storeRulesGame Сохраняет правила игры в базе данных данными из request-a
     *
     * @return \Illuminate\Redirect
     */
     public function create(Request $request, StoreGameAction $storeGame,
                            StoreInfosGameAction $storeInfosGame, StoreRulesGameAction $storeRulesGame)
    {
        $game = $storeGame->handle($request);
        $storeInfosGame->handle($request, $game->id);
        $storeRulesGame->handle($request, $request->count, $game->id);
        return redirect()->route('index')->with([
            'success' => 'The game "' . $game->name . '" was successfully created',
        ]);
    }

    /**
     * Возращает страничку редактирования игры
     *
     * @param  int $gameId ID игры
     * @param  App\Actions\GetInfoFromEditGameAction $getInfoFromEditGame Получает данные игры для их редактирования
     *
     * @return \Illuminate\View\View
     */
    public function edit(int $gameId, GetInfoFromEditGameAction $getInfoFromEditGame)
    {
        return view('admin.edit', $getInfoFromEditGame->handle($gameId));
    }

    /**
     * Обновляет информацию об игре
     *
     * @param Request $request
     * @param int $gameId ID игры
     * @param App\Actions\UpdateGameAction $updateGame Обновляет игру в базе данных
     * @param App\Actions\UpdateInfosAction $updateInfos Обновляет информацию об игре в базе данных
     * @param App\Actions\UpdateRulesAction $updateRules Обновляет правила игры в базе данных
     *
     * @return \Illuminate\Redirect
     */
    public function update(Request $request, int $gameId,
                           UpdateGameAction $updateGame, UpdateInfosAction $updateInfos, UpdateRulesAction $updateRules)
    {
        $updateGame->handle($request, $gameId);
        $updateInfos->handle($gameId);
        $updateRules->handle($request, $request->count, $gameId);
        return redirect()->route('game', $request->name)->with([
            'success' => 'The information for "' . $request->name . '" was updated',
        ]);
    }

    /**
     * Удаляет игру
     *
     * @param int $gameId ID игры
     * @param App\Acions\DeleteAllDataAction $deleteAllData Удаляет данные об игре
     *
     * @return \Illuminate\Redirect
     */
    public function delete(int $gameId, DeleteAllDataAction $deleteAllData)
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
     * @param App\Acions\GetAllInfoAction $getAllInfo Получает все данные из базы данных
     *
     * @return \Illuminate\View\View
     */
    public function players(GetAllInfoAction $getAllInfo)
    {
        return view('admin.players', $getAllInfo->get());
    }

    /**
     * Возращает страничку users
     *
     * @param App\Acions\GetAllInfoUserAction $getAllInfoUser Получает все данные из базы данных о юзере
     *
     * @return \Illuminate\View\View
     */
    public function users(GetAllInfoUserAction $getAllInfoUser)
    {
        return view('admin.users', $getAllInfoUser->handle());
    }

    /**
     *  Изменяет контактную информацию admin-а
     *
     * @param App\Http\Request\StoreContactInformation $request
     * @param App\Actions\UpdateContactAction $updateContact Обновляет контактные данные
     *
     * @return \Illuminate\Redirect
     */
    public function contactInformation(StoreContactInformation $request, UpdateContactAction $updateContact)
    {
        $updateContact->update($request);
        return redirect()->route('credential')->with([
            'success' => 'Your contact information was updated',
        ]);
    }

    /**
     * Изменяет игровую информацию admin-а
     *
     * @param App\Http\Request\UpdatePlayerRequest $request
     * @param App\Actions\UpdatePlayerAction $updatePlayer Обновляет игровые данные admin-а
     *
     * @return \Illuminate\Redirect
     */
    public function playerInformation(UpdatePlayerRequest $request, UpdatePlayerAction $updatePlayer)
    {
        $updatePlayer->handle($request);
        return redirect()->route('credential')->with([
            'success' => 'Your game information was updated',
        ]);
    }

    /**
     * Обновляет пароль
     *
     * @param Illuminate\Http\Request $request
     * @param App\Actions\UpdatePasswordAction $updatePassword Обновляет пароль
     *
     * @return \Illuminate\Redirect
     */
    public function adminInformation(Request $request, UpdatePasswordAction $updatePassword)
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
     * @param App\Actions\DeletePlayerAction $deletePlayer Удаляет игрока по id из базы данных players
     *
     * @return \Illuminate\Redirect
     */
    public function deletePlayer(int $playerId, DeletePlayerAction $deletePlayer)
    {
        return redirect()->route('players')->with([
            'success' => 'Players "' . $deletePlayer->handle($playerId) . '" was successfully deleted'
        ]);
    }
    /**
     * Удаляет Usera по id
     *
     * @param int $playerId id Usera
     * @param App\Actions\DeleteUserAction $deleteUser Удаляет юзера по id из базы данных users
     *
     * @return \Illuminate\Redirect
     */
    public function deleteUser(int $userId, DeleteUserAction $deleteUser)
    {
        return redirect()->route('users')->with([
            'success' => 'User "' . $deleteUser->handle($userId) . '" was successfully deleted'
        ]);
    }

    /**
     * Добавляет и убирает очивки у игроков
     *
     * @param int $idPlayer id игрока
     * @param Illuminate\Http\Request $request
     * @param App\Actions\GetAchievementsAction $getAchievements Добавляет и убирает очивки
     *
     * @return \Illuminate\Redirect
     */
    public function getAchievements(int $idPlayer, Request $request, GetAchievementsAction $getAchievements)
    {
        $getAchievements->handle($request, $idPlayer);
        return redirect()->back();
    }
}
