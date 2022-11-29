<?php

namespace App\Actions;

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
    public function handle(Request $request)
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
