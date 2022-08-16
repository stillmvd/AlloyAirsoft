<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmailRequest;
use App\Http\Requests\StoreFormRequest;
use App\Models\Game;
use App\Models\Player;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {

        return view('index', [
            'games' => DB::table('games')->where('finished', '=', '0')->get(),
            'number' => DB::table('games')->get()->count()
        ]);
    }

    public function archive() {

        return view('archive', [
            'teams' => DB::table('teams')->get(),
            'number' => DB::table('games')->get()->count(),
            'games' => DB::table('games')->where('finished', 1)->get(),
        ]);
    }

    public function game($id) {

        $items = DB::table('descriptions')->get();
        $amount = $items->count();
        return view('game', [
            'first_cord' => Game::find($id)->first_cord,
            'second_cord' => Game::find($id)->second_cord,
            'game' => Game::find($id),
            'items' => $items,
            'amount' => $amount,
            'teams' => Db::table('teams')->get('name'),
            'teams_count' => DB::table('teams')->count(),
        ]);
    }

    public function store_players(StoreFormRequest $request, $id) {

        $request->validate();
        Player::create([
            'created_at' => now(),
            'game_id' => $id,
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'email' => $request->email,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
        // Mail::to($request->email)->send(new Mailing([
        //     'title' => 'Поздравляем с регистрацией на игру!',
        //     'message' => 'Вы успешно зарегистрировались на игру!',
        // ]));
        return redirect()->route('game', $id)
                ->with(['success' => 'You are registered for the game']);
    }

    public function save_email(StoreEmailRequest $request) {
        if(DB::table('emails')->where('email', $request->email)->exists()) {

            return redirect()->back()
                    ->with(['error' => 'You have already subscribed to the newsletter!']);
        } else {

            DB::table('emails')->insert(['email' => $request->email, 'created_at' => now(), 'updated_at' => now()]);
            // Mail::to($request->email)->send(new Mailing([
            //     'title' => 'Вы успешно подписались на расслыку!',
            //     'message' => 'Вы успешно подписались на расслыку!',
            // ]));

            return redirect()->back()
                    ->with(['success' => 'You have successfully subscribed to the newsletter!']);
        }
    }
}
