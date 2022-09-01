<?php

namespace App\Http\Controllers;

use App\Actions\DeleteAllDataAction;
use App\Actions\GetAdminInfoAction;
use App\Actions\GetAllInfoAction;
use App\Actions\GetInfoFromEditGameAction;
use App\Actions\StoreGameAction;
use App\Actions\StoreInfosGameAction;
use App\Actions\StoreRulesGameAction;
use App\Actions\UpdateGameAction;
use App\Actions\UpdateInfosAction;
use App\Actions\UpdateRulesAction;

use Illuminate\Http\Request;

/** AdminController содержит основные контроллеры работающие в админке. */
class AdminController extends Controller
{
    /**
     * Login для админа
     * 
     * @param Request $request
     * @return \Illuminate\View\View Возвращает главную страничку админки
     */
    public function login(Request $request)
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
            'success' => 'The game "' . $game->name . '" was successfully create',
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
        $game = $updateGame->update($request, $gameId);
        $updateInfos->update($gameId);
        $updateRules->update($request, $request->count, $gameId);
        return redirect()->route('index')->with([
            'success' => 'The game "' . $game->name . '" was successfully change',
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

        return redirect()->back()->with([
            'success' => 'The game "' . $gameName . '" was successfully deleted',
        ]);
    }

    /**
     * Возращает страничку players
     * 
     * @param GetAllInfoAction $getAllInfo Получает все данные из базы данных
     * @return \Illuminate\View\View
     */
    public function players(GetAllInfoAction $getAllInfo)
    {
        return view('admin.players', $getAllInfo->get());
    }
}
