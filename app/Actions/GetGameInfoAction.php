<?php
namespace App\Actions;

use App\Models\Game;
use App\Models\Info;
use App\Models\Rule;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;

class GetGameInfoAction
{
    use DispatchesJobs;

    public function get_info(int $game_id) : array
    {
        $rules = Rule::where('game_id', $game_id)->get();
        return [
            'first_cord' => Game::find($game_id)->first_cord,
            'second_cord' => Game::find($game_id)->second_cord,
            'infos' => Info::where('game_id', $game_id)->first(),
            'rules' => $rules,
            'amount' => $rules->count(),
            'game' => Game::find($game_id),
            'teams' => DB::table('teams')->get('name'),
            'teams_count' => DB::table('teams')->count(),
        ];
    }
}
