<?php

namespace App\Actions\UserActions;

use App\Models\User;

class DeleteUserAction
{
    /**
     * Удаляет пользователя по id из базы данных users, возращает имя пользователя которого удалили
     *
     * @param int $user Id Пользователя
     * @return string
     */
    public function handle(int $user)
    {
        if (User::where('id', $user)->count() >= 1)
        {
            $id = User::where('id', $user)->get()[0]->id;
            User::where('id', $user)->delete();
            return $id;
        }
    }
}
