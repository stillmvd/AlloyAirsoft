<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index() {
        $games = DB::table('games')->get();
        $alert = Session::get('alert');
        return view('index', compact('games', 'alert'));
    }

    public function archive() {
        $games = DB::table('games')->where('finished', '=', 1)->get();
        $alert = Session::get('alert');
        return view('archive', compact('games', 'alert'));
    }

    public function game($id) {
        $first_cord = Game::find($id)->first_cord;
        $second_cord = Game::find($id)->second_cord;
        $game = Game::find($id);
        return view('game', compact('first_cord', 'second_cord', 'game'));
    }

    public function store($id) {
        return 'Сохраняю';
    }

    public function save_email(Request $request) {
        $request->validate([
            'email' => ['required', 'email:rfc,dns']
        ]);

        if(DB::table('emails')->where('email', '=', $request->email)->exists()) {
            return redirect(url()->previous())->with(['alert' => 'You have already subscribed to the newsletter!']);
        }

        DB::table('emails')->insert(['email' => $request->email, 'created_at' => now(), 'updated_at' => now()]);
        return redirect(url()->previous())
             ->with(['alert' => 'You have successfully subscribed to the newsletter!']);
    }
}
