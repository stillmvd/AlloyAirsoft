<?php

namespace App\Actions\PlayerActions;

use App\Models\Player;

class DeletePlayerAction
{
    /**
     * Удаляет игрока по id из базы данных players, возращает имя пользователя которого удалили
     *
     * @param int $playerId Id Игрока
     * @return string
     */
    public function handle(int $playerId): string
    {
        if(Player::where('id', $playerId)->count() >= 1)
        {
            $name = Player::where('id', $playerId)->get()[0]->name;
            Player::where('id', $playerId)->delete();
            return $name;
        }
        return '';
    }
}
