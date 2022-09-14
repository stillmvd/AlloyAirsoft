<?php

namespace App\Http\Controllers;

use App\Actions\DeleteAllDataAction;
use App\Actions\DeletePlayerAction;
use App\Actions\GetAdminInfoAction;
use App\Actions\GetAllInfoAction;
use App\Actions\GetInfoFromEditGameAction;
use App\Actions\StoreGameAction;
use App\Actions\StoreInfosGameAction;
use App\Actions\StoreRulesGameAction;
use App\Actions\UpdateContactAction;
use App\Actions\UpdateGameAction;
use App\Actions\UpdateInfosAction;
use App\Actions\UpdateLoginAction;
use App\Actions\UpdatePasswordAction;
use App\Actions\UpdatePlayerAction;
use App\Actions\UpdateRulesAction;

use App\Http\Requests\StoreContactInformation;
use App\Http\Requests\StoreFormRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/** AdminController содержит основные контроллеры работающие в админке. */
class AdminController extends Controller
{
    /**
     * Входин в аккаунт
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
        if (auth()->attempt($validated))
        {
            return redirect()->route('admin');
        }
        else
        {
            return redirect()->back()->withErrors(
                ['loginError' => 'You have some errors']
            );
        }
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
     * @return \Illuminate\View\View
     */
    public function index(GetAdminInfoAction $getAdminInfo)
    {
        return view('admin.index', $getAdminInfo->getInfo());
    }

    /**
     * Отображает страницу изменения данных
     *
     * @param App\Actions\getAdminInfoAction $getAdminInfo Получает информацию для админки
     * @return \Illuminate\View\View
     */
    public function credential(GetAdminInfoAction $getAdminInfo)
    {
        return view('admin.credential', $getAdminInfo->getInfo());
    }

    /**
     * Создает игру
     *
     * @param Request $request
     * @param App\Actions\StoreGameAction $storeGame Сохраняет игру в базе данных данными из request-a
     * @param App\Actions\StoreInfosGameAction $storeInfosGame Сохраняет информацию об игре в базе данных данными из request-a
     * @param App\Actions\StoreRulesGameAction $storeRulesGame Сохраняет правила игры в базе данных данными из request-a
     * @return \Illuminate\Redirect
     */
     public function create(Request $request, StoreGameAction $storeGame,
                           StoreInfosGameAction $storeInfosGame, StoreRulesGameAction $storeRulesGame)
    {
        $game = $storeGame->saveGame($request);
        $storeInfosGame->saveInfos($request, $game->id);
        $storeRulesGame->saveRules($request, $request->count, $game->id);
        return redirect()->route('index')->with([
            'success' => 'The game "' . $game->name . '" was successfully created',
        ]);
    }

    /**
     * Возращает страничку редактирования игры
     *
     * @param  int $gameId ID игры
     * @param  App\Actions\GetInfoFromEditGameAction $getInfoFromEditGame Получает данные игры для их редактирования
     * @return \Illuminate\View\View
     */
    public function edit(int $gameId, GetInfoFromEditGameAction $getInfoFromEditGame)
    {
        return view('admin.edit', $getInfoFromEditGame->getInfo($gameId));
    }

    /**
     * Обновляет информацию об игре
     *
     * @param Request $request
     * @param int $gameId ID игры
     * @param App\Actions\UpdateGameAction $updateGame Обновляет игру в базе данных
     * @param App\Actions\UpdateInfosAction $updateInfos Обновляет информацию об игре в базе данных
     * @param App\Actions\UpdateRulesAction $updateRules Обновляет правила игры в базе данных
     * @return \Illuminate\Redirect
     */
    public function update(Request $request, int $gameId,
                           UpdateGameAction $updateGame, UpdateInfosAction $updateInfos, UpdateRulesAction $updateRules)
    {
        $updateGame->update($request, $gameId);
        $updateInfos->update($gameId);
        $updateRules->update($request, $request->count, $gameId);
        return redirect()->route('game', $request->name)->with([
            'success' => 'The information for "' . $request->name . '" was updated',
        ]);
    }

    /**
     * Удаляет игру
     *
     * @param int $gameId ID игры
     * @param App\Acions\DeleteAllDataAction $deleteAllData Удаляет данные об игре
     * @return \Illuminate\Redirect
     */
    public function delete(int $gameId, DeleteAllDataAction $deleteAllData)
    {
        $gameName = getNameGame($gameId);
        $deleteAllData->delete($gameId);

        return redirect('/')->with([
            'success' => 'The game "' . $gameName . '" was deleted',
        ]);
    }

    /**
     * Возращает страничку players
     *
     * @param App\Acions\GetAllInfoAction $getAllInfo Получает все данные из базы данных
     * @return \Illuminate\View\View
     */
    public function players(GetAllInfoAction $getAllInfo)
    {
        return view('admin.players', $getAllInfo->get());
    }

    /**
     *  Изменяет контактную информацию admin-а
     *
     * @param App\Http\Request\StoreContactInformation $request
     * @param App\Actions\UpdateContactAction $updateContact Обновляет контактные данные
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
     * @return \Illuminate\Redirect
     */
    public function playerInformation(UpdatePlayerRequest $request, UpdatePlayerAction $updatePlayer)
    {
        $updatePlayer->update($request);
        return redirect()->route('credential')->with([
            'success' => 'Your game information was updated',
        ]);
    }

    /**
     * Обновляет пароль
     *
     * @param Illuminate\Http\Request $request
     * @param App\Actions\UpdatePasswordAction $updatePassword Обновляет пароль
     * @return \Illuminate\Redirect
     */
    public function adminInformation(Request $request, UpdatePasswordAction $updatePassword)
    {
        if($updatePassword->update($request))
        {
            return redirect()->route('credential')->with([
                'success' => 'Password was changed',
            ]);
        }
        else
        {
            return redirect()->route('credential')->with([
                'error' => 'Incorrect password for ' . DB::table('users')->where('id', auth()->id())->get()->value('login'),
            ]);
        }
    }

    public function deletePlayer(int $playerId, DeletePlayerAction $deletePlayer)
    {
        return redirect()->route('players')->with([
            'success' => 'Players "' . $deletePlayer->delete($playerId) . '" was successfully deleted'
        ]);
    }
}
