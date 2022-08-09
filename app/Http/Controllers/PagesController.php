<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
