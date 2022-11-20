<?php

namespace App\Actions;

use App\Models\Player;

class DeletePlayerAction
{
    /**
     * Удаляет игрока по id из базы данных players, возращает имя пользователя которого удалили
     *
     * @param int $palyerId Id Игрока
     * @return string
     */
    public function handle(int $palyerId){
        if(Player::where('id', $palyerId)->count() >= 1)
        {
            $name = Player::where('id', $palyerId)->get()[0]->name;
            Player::where('id', $palyerId)->delete();
            return $name;
        }
    }
}
