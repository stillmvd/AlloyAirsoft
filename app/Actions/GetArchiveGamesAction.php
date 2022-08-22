<?php
namespace App\Actions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;

class GetArchiveGamesAction
{
    use DispatchesJobs;

    public function get_info() : array
    {
        return [
            'teams' => DB::table('teams')->get(),
            'number' => DB::table('games')->get()->count(),
            'games' => DB::table('games')->where('finished', 1)->get(),
        ];
    }
}
