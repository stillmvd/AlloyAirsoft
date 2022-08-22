<?php

namespace App\Http\Controllers;

use App\Actions\GetArchiveGamesAction;
use App\Actions\GetGameInfoAction;
use App\Actions\GetUpcomingGamesAction;
use App\Actions\SendEmailAction;
use App\Actions\StoreEmailAction;
use App\Actions\StorePlayerAction;
use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreFormRequest;

class PagesController extends Controller
{
    public function index(GetUpcomingGamesAction $getUpcomingGamesAction)
    {
        return view('index', $getUpcomingGamesAction->get_info());
    }

    public function archive(GetArchiveGamesAction $getArchiveGamesAction)
    {
        return view('archive', $getArchiveGamesAction->get_info());
    }

    public function game(GetGameInfoAction $getGameInfoAction, $game_id)
    {
        return view('game', $getGameInfoAction->get_info($game_id));
    }

    public function store_players(StoreFormRequest $request, $game_id,
                                  StorePlayerAction $storePlayerAction, SendEmailAction $sendEmailAction)
    {
        $storePlayerAction->save($request, $game_id);
        $sendEmailAction->send($request->email, 'Вы успешно заригистрировались на игру', 'Вы успешно заригистрировались на игру');
        return redirect()->route('game', $game_id)->with(
            ['success' => 'You are registered for the game']
        );
    }

    public function save_email(StoreEmailRequest $request, StoreEmailAction $storeEmailAction,
                               SendEmailAction $sendEmailAction)
    {
        if(isExistsDB($request->email)) {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        } else {
            $storeEmailAction->save($request->email);
            $sendEmailAction->send($request->email, 'Вы успешно заригистрировались на игру', 'Вы успешно заригистрировались на игру');
            return redirect()->back()->with(
                ['success' => 'You have successfully subscribed to the newsletter!']
            );
        }
    }
}
