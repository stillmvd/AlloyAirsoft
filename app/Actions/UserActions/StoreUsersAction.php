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
     * @param StoreUsersRequest $request Провалидированные данные для регистрации
     *
     * @return object Созданный юзер
     */
    public function handle(StoreUsersRequest $request): object
    {
        $player = new Player([
            'emailPlayer' => $request->input('emailPlayerForReg'),
            'team_id' => '1002',
        ]);
        $player->save();

        return User::create([
            'email' => $request->input('emailPlayerForReg'),
            'password' => Hash::make($request->input('passwordForReg')),
            'isActive' => true,
            'isAdmin' => false,
            'player_id' => $player->id,
        ]);
    }
}
