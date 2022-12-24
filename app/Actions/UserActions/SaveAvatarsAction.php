<?php

namespace App\Actions\UserActions;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SaveAvatarsAction
{
    /**
     * Сохраняет в базе данных путь к аватару в storage
     *
     * @param Request $request
     *
     * @return void
     */
    public function handle(Request $request): void
    {
        if ($request->file('avatar') != null)
        {
            $path = $request->file('avatar')->storeAs('avatars', Auth::user()->id . '.jpg');
        }

        User::find(Auth::user()->id)->update([
            'pathToAvatar' => $path,
        ]);
    }
}
