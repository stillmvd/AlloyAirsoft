<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller
{
    public function index() {

        return view('index');
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
