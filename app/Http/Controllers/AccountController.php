<?php

namespace App\Http\Controllers;

use App\Actions\UserActions\ChangeCredentialForUserAction;
use App\Actions\UserActions\DeleteUserAvatarAction;
use App\Actions\UserActions\SaveAvatarsAction;

use App\Http\Requests\StoreCredentialForUserRequest;
use App\Http\Requests\StoreTeamRequest;
use App\Models\Team;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class AccountController extends Controller
{
    /**
     * Description
     *
     * @param Request $request
     * @param SaveAvatarsAction $saveAvatars Сохраняет аватарку юзера
     *
     * @return RedirectResponse
     */
    public function saveAvatar(Request $request, SaveAvatarsAction $saveAvatars): RedirectResponse
    {
        $saveAvatars->handle($request);
        return redirect()->back();
    }

    /**
     * Удаляет аватар
     *
     * @param int $id id юзера
     * @param DeleteUserAvatarAction $deleteUserAvatar
     *
     * @return RedirectResponse
     */
    public function deleteAvatar(int $id, DeleteUserAvatarAction $deleteUserAvatar) : RedirectResponse
    {
        $deleteUserAvatar->handle($id);
        return redirect()->back();
    }

    /**
     * Description
     *
     * @param StoreCredentialForUserRequest $request Провалидированные данные
     * @param ChangeCredentialForUserAction $changeCredentialForUser Обновляет данные плеера
     *
     * @return RedirectResponse
     */
    public function changeCredentialForUser(StoreCredentialForUserRequest $request,
                    ChangeCredentialForUserAction $changeCredentialForUser) : RedirectResponse
    {
        $changeCredentialForUser->handle($request);
        return redirect()->back();
    }

    public function createTeam() : View
    {
        return view('account.createTeam');
    }

    public function storeTeam(StoreTeamRequest $request, int $id): RedirectResponse
    {
        Team::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'leader_id' => $id,
        ]);

        return redirect()->route('personal_account', ['id' => $id])->with([
            'success' => $request->input('name'),
        ]);
    }
}
