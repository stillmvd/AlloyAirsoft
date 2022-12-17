<?php

namespace App\Actions\UserActions;

use App\Http\Requests\StoreUsersRequest;
use App\Models\Player;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUsersAction
{
    /**
     * Сохраняет пользователя и создает игрока без данных, соединяя их в бд
     *
     * @param App\Http\Request\StoreUsersRequest $request Провалидированные данные для регистрации
     *
     * @return object Созданный юзер
     */
    public function handle(StoreUsersRequest $request)
    {
        $player = new Player([
            'emailPlayer' => $request->emailPlayerForReg,
            'team_id' => '1002',
        ]);
        $player->save();

        $user = User::create([
            'email' => $request->emailPlayerForReg,
            'password' => Hash::make($request->passwordForReg),
            'isActive' => true,
            'isAdmin' => false,
            'player_id' => $player->id,
        ]);

        return $user;
    }
}
