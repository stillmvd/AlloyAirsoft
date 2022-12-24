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
    public function handle(int $user): string
    {
        if (User::where('id', $user)->count() >= 1)
        {
            $userName = User::where('id', $user)->get()[0]->name;
            User::where('id', $user)->delete();
            return $userName;
        }
        return '';
    }
}
