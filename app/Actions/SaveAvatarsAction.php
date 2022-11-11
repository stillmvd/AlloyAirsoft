<?php

namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaveAvatarsAction
{
    public function save(Request $request)
    {
        if ($request->file('avatar') != null)
        {
            $path = $request->file('avatar')->storeAs('avatars', Auth::user()->id . '.jpg');
        }

        DB::table('users')->where('id', Auth::user()->id)->update([
            'pathToAvatar' => $path,
        ]);
    }
}
