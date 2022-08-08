<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function current() {
        return view('current');
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
