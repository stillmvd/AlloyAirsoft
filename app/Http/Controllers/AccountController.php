<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function saveAvatar(Request $request)
    {
        if ($request->file('avatar') != null)
        {
            $path = $request->file('avatar')->storeAs('avatars', Auth::user()->id . '.jpg');
        }

        DB::table('users')->where('id', Auth::user()->id)->update([
            'pathToAvatar' => $path,
        ]);

        return redirect()->back();
    }
}
