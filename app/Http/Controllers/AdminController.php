<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function login(StoreAdminRequest $request) {
        // Comment
        $validated = $request->validate([
            'login' => 'required',
            'password' => 'required',
        ]);
        if (auth()->attempt($validated)) {
            // Comment
            return redirect('admin');
        } else {
            // Comment
            return redirect()->back()
                    ->withErrors(['loginError' => 'You have some errors']);
        }
    }

    public function logout() {
        // Comment
        auth()->logout();
        return redirect('/');
    }

    public function index(Request $request) {
        // Comment
        $games = DB::table('games')->get();
        $players = DB::table('players')->get();
        return view('admin.index', compact('games', 'players'));
    }

    public function create(Request $request) {
        $game = Game::create([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'info' => request('info'),
            'time' => $request->input('time'),
            'polygon' => $request->input('polygon'),
            'first_cord' => $request->input('first_cord'),
            'second_cord' => $request->input('second_cord'),
            'levels' => $request->input('levels'),
            'finished' => 0,
        ]);
        DB::table('infos')->insert([
            'title' => request('title'),
            'text' => request('text'),
            'game_id' => $game->id,
        ]);

        if ($request->count <= 1) {
            DB::table('rules')->insert([
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'game_id' => $game->id,
            ]);
        } else {
            for($i = 0; $i < $request->count; $i++){
                if ($request->input('title' . $i) == null || $request->input('text' . $i) == null) {

                } else {
                    DB::table('rules')->insert([
                        'title' => $request->input('title' . $i),
                        'text' => $request->input('text' . $i),
                        'game_id' => $game->id,
                    ]);
                }
            }
        }

        return redirect()->route('admin');
    }
    public function edit($id){
        return view('admin.edit', [
            'infos' => DB::table('infos')->where('game_id', $id)->get()->first(),
            'rules' => DB::table('rules')->where('game_id', $id)->get(),
            'players' => DB::table('players')->where('game_id', $id)->get(),
            'games' =>  DB::table('games')->where('id', $id)->get()->first(),
        ]);
    }

    public function update(Request $request, $id){
        $game = Game::find($id);
        DB::table('games')->where('id', $game->id)->update([
            'date' => $request->input('date'),
            'name' => $request->input('name'),
            'info' => request('info'),
            'time' => $request->input('time'),
            'polygon' => $request->input('polygon'),
            'first_cord' => $request->input('first_cord'),
            'second_cord' => $request->input('second_cord'),
            'levels' => $request->input('levels'),
            'finished' => 0,
        ]);

        DB::table('infos')->where('id', $game->id)->update([
            'title' => request('title'),
            'text' => request('text'),
            'game_id' => $game->id,
        ]);

        if ($request->count <= 1) {
            DB::table('rules')->where('id', $game->id)->update([
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'game_id' => $game->id,
            ]);
        } else {
            for($i = 0; $i < $request->count; $i++){
                if ($request->input('title' . $i) == null || $request->input('text' . $i) == null) {

                } else {
                    DB::table('rules')->where('id', $game->id)->update([
                        'title' => $request->input('title' . $i),
                        'text' => $request->input('text' . $i),
                        'game_id' => $game->id,
                    ]);
                }
            }
        }
        return redirect()->route('index')->with([
            'success' => 'The game "' . $game->name . '" was successfully change',
        ]);
    }

    public function delete($id) {
        $game_name = Game::find($id)->name;
        DB::table('infos')->where('game_id', $id)->delete();
        DB::table('rules')->where('game_id', $id)->delete();
        DB::table('players')->where('game_id', $id)->delete();
        DB::table('games')->where('id', $id)->delete();
        return redirect()->back()->with([
            'success' => 'The game "' . $game_name . '" was successfully deleted',
        ]);
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
