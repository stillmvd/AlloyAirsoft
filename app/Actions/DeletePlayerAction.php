<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class DeletePlayerAction
{
    /**
     * Удаляет игрока по id из базы данных players, возращает имя пользователя которого удалили
     *
     * @param int $palyerId Id Игрока
     * @return string
     */
    public function delete(int $palyerId){
        if(DB::table('players')->where('id', $palyerId)->count() >= 1)
        {
            $name = DB::table('players')->where('id', $palyerId)->get()[0]->name;
            DB::table('players')->where('id', $palyerId)->delete();
            return $name;
        }
    }
}
