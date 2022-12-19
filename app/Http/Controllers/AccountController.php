<?php

namespace App\Http\Controllers;

use App\Actions\UserActions\ChangeCredentialForUserAction;
use App\Actions\UserActions\DeleteUserAvatarAction;
use App\Actions\UserActions\SaveAvatarsAction;

use App\Http\Requests\StoreCredentialForUserRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Description
     *
     * @param Request $request
     * @param App\Actions\UserActions\SaveAvatarsAction $saveAvatars Сохраняет аватарку юзера
     *
     * @return Illuminate\Redirect\
     */
    public function saveAvatar(Request $request, SaveAvatarsAction $saveAvatars)
    {
        $saveAvatars->handle($request);
        return redirect()->back();
    }

    /**
     * Удаляет аватар
     *
     * @param int $id id юзера
     * @param App\Actions\UserActions\DeleteUserAvatarAction $deleteUserAvatar
     *
     * @return Illuminate\Redirect\
     */
    public function deleteAvatar(int $id, DeleteUserAvatarAction $deleteUserAvatar)
    {
        $deleteUserAvatar->handle($id);
        return redirect()->back();
    }

    /**
     * Description
     *
     * @param StoreCredentialForUserRequest $request Провалидированные данные
     * @param App\Actions\UserActions\ChangeCredentialForUserAction $changeCredentialForUser Обновляет данные плеера
     *
     * @return Illuminate\Redirect\
     */
    public function changeCredentialForUser(StoreCredentialForUserRequest $request,
                    ChangeCredentialForUserAction $changeCredentialForUser)
    {
        $changeCredentialForUser->handle($request);
        return redirect()->back();
    }

    public function createTeam()
    {
        return view('account.createTeam');
    }

    public function storeTeam(StoreTeamRequest $request, int $id)
    {
        Team::create([
            'name' => $request->name,
            'description' => $request->description,
            'leader_id' => $id,
        ]);

        return redirect()->route('personal_account', ['id' => $id])->with([
            'succsess' => $request->name,
        ]);
    }
}
