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

    public function logout()
    {
        auth()->logout();
        return redirect()->route('index');
    }

    public function index(GetAdminInfoAction $getAdminInfo)
    {
        return view('admin.index', $getAdminInfo->getInfo());
    }

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

    public function edit(int $gameId, GetInfoFromEditGameAction $getInfoFromEditGame)
    {
        return view('admin.edit', $getInfoFromEditGame->getInfo($gameId));
    }

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

    public function delete(int $gameId, DeleteAllDataAction $deleteAllData)
    {
        $gameName = getNameGame($gameId);
        $deleteAllData->delete($gameId);

        return redirect()->back()->with([
            'success' => 'The game "' . $gameName . '" was successfully deleted',
        ]);
    }

    public function players(GetAllInfoAction $getAllInfo)
    {
        return view('admin.players', $getAllInfo->get());
    }
}
