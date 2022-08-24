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
    public function index(GetUpcomingGamesAction $getUpcomingGames)
    {
        return view('index', $getUpcomingGames->getGames());
    }

    public function archive(GetArchiveGamesAction $getArchiveGames)
    {
        return view('archive', $getArchiveGames->getGames());
    }

    public function game(GetGameInfoAction $getGameInfo, int $gameId)
    {
        return view('game', $getGameInfo->getInfo($gameId));
    }

    public function storePlayers(StoreFormRequest $request, int $gameId, getOldDataOfPlayer $getOldData,
                                  StorePlayerAction $storePlayer, SendEmailAction $sendEmail)
    {
        $getOldData->getData($request);
        $storePlayer->createPlayerInDB($request, $gameId);
        $sendEmail->sendEmail($request->email, 'Вы успешно заригистрировались на игру', 'Вы успешно заригистрировались на игру');

        return redirect()->route('game', $gameId)->with(
            ['success' => 'You are registered for the game']
        );
    }

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
            $sendEmail->sendEmail($request->email, 'Вы успешно заригистрировались на игру', 'Вы успешно заригистрировались на игру');

            return redirect()->back()->with(
                ['success' => 'You have successfully subscribed to the newsletter!']
            );
        }
    }
}
