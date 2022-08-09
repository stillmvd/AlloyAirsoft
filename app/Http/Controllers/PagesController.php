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
        return view('archive');
    }

    public function game($id) {
        return view('game');
    }

    public function store($id) {
        return 'Сохраняю';
    }
}
