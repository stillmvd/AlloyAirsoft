<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function ()
        {
            $games = DB::table('games')->where('finished', '=', 0)->get();
            foreach ($games as $game)
            {
                $currentDate = date('Y-m-d');
                $gameDate = Carbon::parse($game->date);
                if($gameDate->lt($currentDate))
                {
                    DB::table('games')->where('id', '=', $game->id)->update(['finished' => 1]);
                }
            }
        })->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
