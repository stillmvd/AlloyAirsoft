<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login() {
        return view('admin.login');
    }
    public function logout() {
        auth()->logout();
        return redirect('/');
    }
    public function store(Request $request) {
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($validated)) {
            return redirect('admin');
        } else {
            return redirect()->back()->withErrors([
                'loginError' => 'You have some errors',
            ]);
        }
    }
    public function index() {
        return view('admin.index');
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
