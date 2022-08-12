<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index() {
        $games = DB::table('games')->get();
<<<<<<< HEAD
        return view('index', compact('games'));
=======
        $success = Session::get('success');
        return view('index', compact('games', 'success'));
>>>>>>> 415e818625244c1a11036ed28ff4564edcf5bd5f
    }

    public function archive() {
        $games = DB::table('games')->where('finished', '=', 1)->get();
<<<<<<< HEAD
        return view('archive', compact('games'));
=======
        $success = Session::get('success');
        $teams = DB::table('teams')->get();
        return view('archive', compact('games', 'success'));
>>>>>>> 415e818625244c1a11036ed28ff4564edcf5bd5f
    }

    public function game($id) {
        $first_cord = Game::find($id)->first_cord;
        $second_cord = Game::find($id)->second_cord;
        $game = Game::find($id);
<<<<<<< HEAD
        $teams = Db::table('teams')->get('name');
        return view('game', compact('first_cord', 'second_cord', 'game', 'teams'));
=======

        $success = Session::get('success');
        $teams = DB::table('teams')->get();
        $teams_count = DB::table('teams')->count();
        return view('game', compact('first_cord', 'second_cord', 'game', 'success', 'teams', 'teams_count'));
>>>>>>> 415e818625244c1a11036ed28ff4564edcf5bd5f
    }

    public function store_players(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'call' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'max:20'],
            'team' => ['required'],
        ]);
        $player = new Player([
            'created_at' => now(),
            'game_id' => $id,
            'name' => $request->name,
            'surname' => $request->surname,
            'call' => $request->call,
            'email' => $request->email,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
        $player->save();
        return redirect()->route('game', $id)->with(['success' => 'You are registered for the game']);
    }

    public function save_email(Request $request) {
        $request->validate([
            'email' => ['required', 'email:rfc,dns']
        ]);

        if(DB::table('emails')->where('email', '=', $request->email)->exists()) {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        } else {
            DB::table('emails')->insert(['email' => $request->email, 'created_at' => now(), 'updated_at' => now()]);
            return redirect()->back()->with(
                ['success' => 'You have successfully subscribed to the newsletter!']
            );
        }
<<<<<<< HEAD
=======

        DB::table('emails')->insert(['email' => $request->email, 'created_at' => now(), 'updated_at' => now()]);
        return redirect()->back()->with(
            ['success' => 'You have successfully subscribed to the newsletter!']
        );
>>>>>>> 415e818625244c1a11036ed28ff4564edcf5bd5f
    }
}
