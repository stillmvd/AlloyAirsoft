<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('game', compact('first_cord', 'second_cord', 'game'));
    }

    public function store($id) {
        return 'Сохраняю';
    }
}
