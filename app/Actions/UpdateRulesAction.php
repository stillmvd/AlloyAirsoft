<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UpdateRulesAction
{
    /**
     * Обновляет rules для игры
     *
     * @param Request $request
     * @param int $count Количество правил
     * @param int $gameId id игры
     * @return void
     */
    public function update(Request $request, int $count, int $gameId)
    {
        if ($request->count <= 1)
        {
            DB::table('rules')->where('id', $gameId)->update([
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
                    DB::table('rules')->where('id', $gameId)->update([
                        'title' => $titleRules,
                        'text' => $textRules,
                        'game_id' => $gameId,
                    ]);
                }
            }
        }
    }
}
