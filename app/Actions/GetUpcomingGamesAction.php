<?php
namespace App\Actions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;

class GetUpcomingGamesAction
{
    use DispatchesJobs;

    public function get_info() : array
    {
        return [
            'games' => DB::table('games')->where('finished', '=', '0')->get(),
            'number' => DB::table('games')->get()->count()
        ];
    }
}
