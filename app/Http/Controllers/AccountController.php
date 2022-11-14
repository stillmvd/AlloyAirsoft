<?php

namespace App\Http\Controllers;

use App\Actions\ChangeCredentialForUserAction;
use App\Actions\DeleteUserAction;
use App\Actions\DeleteUserAvatarAction;
use App\Actions\SaveAvatarsAction;
use App\Http\Requests\StoreCredentialForUserRequest;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function saveAvatar(Request $request, SaveAvatarsAction $saveAvatars)
    {
        $saveAvatars->save($request);
        return redirect()->back();
    }

    public function deleteAvatar(int $id, DeleteUserAvatarAction $deleteUserAvatar)
    {
        $deleteUserAvatar->delete($id);
        return redirect()->back();
    }

    public function changeCredentialForUser(StoreCredentialForUserRequest $request,
                    ChangeCredentialForUserAction $changeCredentialForUser)
    {
        $changeCredentialForUser->change($request);
        return redirect()->back();
    }
}
