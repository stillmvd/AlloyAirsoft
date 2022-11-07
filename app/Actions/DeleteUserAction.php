<?php

namespace App\Actions;

use Illuminate\Support\Facades\DB;

class DeleteUserAction
{
    /**
     * Удаляет пользователя по id из базы данных users, возращает имя пользователя которого удалили
     *
     * @param int $user Id Пользователя
     * @return string
     */
    public function delete(int $user){
        if(DB::table('users')->where('id', $user)->count() >= 1)
        {
            $id = DB::table('users')->where('id', $user)->get()[0]->id;
            DB::table('users')->where('id', $user)->delete();
            return $id;
        }
    }
}
