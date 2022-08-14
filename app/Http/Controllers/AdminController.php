<?php

namespace App\Http\Controllers;

use App\Models\Description;
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

    public function changeInputs(Request $request){
        $counter = $request->count;
        if($request->Add == 'Add'){
            $counter++;
        }
        else if($request->Remove == 'Remove'){
            $counter--;
        }
        return redirect()->route('admin')->with(['counter' => $counter]);
    }

    public function index(Request $request) {
        $count = $request->session()->get('counter', 1);
        return view('admin.index', ['count' => $count]);
    }

    public function create(Request $request) {
        $description = new Description([
            'title0' => $request->title0,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'title4' => $request->title4,
            'title5' => $request->title5,
            'title6' => $request->title6,
            'title7' => $request->title7,
            'title8' => $request->title8,
            'title9' => $request->title9,
            'text0' => $request->text0,
            'text1' => $request->text1,
            'text2' => $request->text2,
            'text3' => $request->text3,
            'text4' => $request->text4,
            'text5' => $request->text5,
            'text6' => $request->text6,
            'text7' => $request->text7,
            'text8' => $request->text8,
            'text9' => $request->text9,
            'amount' => $request->count,
        ]);
        $description->save();
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
