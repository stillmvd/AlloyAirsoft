<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Modules\Admin\Actions\DeleteUserAction;
use App\Modules\Admin\Readers\AdminReaders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUsersController extends BaseAdminController
{
    private AdminReaders $adminReaders;
    private User $userModel;
    private DeleteUserAction $deleteUserAction;

    public function __construct(AdminReaders $adminReaders, User $userModel, DeleteUserAction $deleteUserAction)
    {
        parent::__construct();
        $this->adminReaders = $adminReaders;
        $this->userModel = $userModel;
        $this->deleteUserAction = $deleteUserAction;
    }

    /*
     * Route('/admin/users', methods="GET")
     */
    public function index(Request $request): View
    {
        $this->checkIsValidAdmin($request);
        $dataVies = $this->adminReaders->getUsersForAdmin();
        return view('admin.users', $dataVies);
    }

    /*
     * Route('/admin/users/delete/{id}', methods="POST")
     */
    public function delete(int $id, Request $request): RedirectResponse
    {
        $this->checkIsValidAdmin($request);
        $result = $this->deleteUserAction->handle($id);

        return redirect()->route('users')->with($result);
    }

    private function checkIsValidAdmin(Request $request): void
    {
        $token = $request->user()->attributesToArray()['api_token'];
        $user = $this->userModel->getUserByToken($token);
        $this->checkUserOnAdmin($user);
    }

}
