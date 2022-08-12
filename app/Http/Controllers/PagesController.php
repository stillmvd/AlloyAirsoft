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
        return view('index', compact('games'));
    }

    public function archive() {
        $games = DB::table('games')->where('finished', '=', 1)->get();
        return view('archive', compact('games'));
    }

    public function game($id) {
        $first_cord = Game::find($id)->first_cord;
        $second_cord = Game::find($id)->second_cord;
        $game = Game::find($id);
        $teams = Db::table('teams')->get('name');
        return view('game', compact('first_cord', 'second_cord', 'game', 'teams'));
    }

    public function store(Request $request, $id) {
        dd($request, $id);
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
    }
}
