<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\Description;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function login() {

        return view('admin.login');
    }
    public function logout() {

        auth()->logout();
        return redirect('/');
    }

    public function store(StoreAdminRequest $request) {

        $validated = $request->validate();
        if (auth()->attempt($validated)) {

            return redirect('admin');
        } else {

            return redirect()->back()
                    ->withErrors(['loginError' => 'You have some errors']);
        }
    }

    public function index(Request $request) {

        return view('admin.index', [
            'count' => $request->session()->get('counter', 1),
        ]);
    }

    public function create(Request $request) {
        Game::create([
            'op-date' => $request->op_date,
            'op-name' => $request->op_name,
            'card-info' => $request->op_info,
            'op-time' => $request->op_time,
            'op-polygon' => $request->op_polygon,
            'first-cord' => $request->first_cord,
            'second-cord' => $request->second_cord,
            'game-info-title' => $request->title_info,
            'game-info' => $request->text_info,
            'levels' => $request->levels,
            'finished' => 0,
        ]);
        for($i = 0; $i < $request->count; $i++){
            DB::table('descriptions')->insert([
                'title' => request('title' . $i),
                'text' => request('text' . $i),
                'game_id' => 1006,
            ]);
        }
        return redirect()->route('admin');
    }

    public function players() {
        $players = DB::table('players')->get();
        $players_count = DB::table('players')->count();

        $emails = DB::table('emails')->get();
        $emails_count = DB::table('emails')->count();

        $games = DB::table('games')->get();
        $games_count = DB::table('games')->count();
        return view('admin.players', compact('players', 'players_count', 'emails', 'emails_count', 'games', 'games_count'));
    }
}
