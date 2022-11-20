<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreRulesGameAction
{
    /**
     * Сохраняет правила в rules для game c gameId
     *
     * @param Illuminate\Http\Request $request
     * @param int $count Количество правил
     * @param int $gameId Id Игры
     * @return void
     */
    public function handle(Request $request, int $count, int $gameId)
    {
        if ($count <= 1)
        {
            DB::table('rules')->insert([
                'title' => $request->input('title'),
                'text' => $request->input('text'),
                'game_id' => $gameId,
            ]);
        }
        else
        {
            for($i = 0; $i < $count; $i++)
            {
                $titleRules = $request->input('title' . $i);
                $textRules = $request->input('text' . $i);
                if (ruleExists($titleRules, $textRules))
                {
                    DB::table('rules')->insert([
                        'title' => $titleRules,
                        'text' => $textRules,
                        'game_id' => $gameId,
                    ]);
                }
            }
        }
    }
}
