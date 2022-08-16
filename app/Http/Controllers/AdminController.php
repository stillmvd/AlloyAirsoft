<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
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
    public function store(StoreAdminRequest $request) {

        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($validated)) {

            return redirect('admin');
        } else {

            return redirect()->back()
                    ->withErrors(['loginError' => 'You have some errors']);
        }
    }

    public function changeInputs(Request $request){

        $counter = $request->count;
        if($request->Add == 'add'){
            $counter++;
        }
        else if($request->Remove == 'remove'){
            $counter--;
        }
        dd($counter);
        return redirect()->route('admin')->with(
            ['counter' => $counter]
        );
    }

    public function index(Request $request) {

        return view('admin.index', [
            'count' => $request->session()->get('counter', 1)
        ]);
    }

    public function create(Request $request) {
        for($i = 0; $i < $request->count; $i++){
            DB::table('descriptions')->insert([
                'title' => request('title' . $i),
                'text' => request('text' . $i),
                'game_id' => $request->game_id,
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
