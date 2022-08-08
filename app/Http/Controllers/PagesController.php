<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function info() {
        return view('info');
    }

    public function archive() {
        return view('archive');
    }
}
