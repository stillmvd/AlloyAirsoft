<?php

namespace App\Http\Controllers;

use App\Actions\SaveAvatarsAction;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function saveAvatar(Request $request, SaveAvatarsAction $saveAvatars)
    {
        $saveAvatars->save($request);
        return redirect()->back();
    }

    public function changeCredentialForUser(Request $request)
    {
        dd($request->all());
        return 0;
    }
}
