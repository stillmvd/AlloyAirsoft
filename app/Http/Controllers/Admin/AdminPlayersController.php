<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Modules\Admin\Actions\DeletePlayerAction;
use App\Modules\Admin\Readers\AdminReaders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminPlayersController extends BaseAdminController
{
    private AdminReaders $adminReaders;
    private User $userModel;
    private DeletePlayerAction $deletePlayerAction;

    public function __construct(AdminReaders $adminReaders, User $userModel, DeletePlayerAction $deletePlayerAction)
    {
        parent::__construct();
        $this->adminReaders = $adminReaders;
        $this->userModel = $userModel;
        $this->deletePlayerAction = $deletePlayerAction;
    }

    /*
     * Route('/admin/players', methods="GET")
     */
    public function index(Request $request): View
    {
        $this->checkIsValidAdmin($request);
        $dataView = $this->adminReaders->getPlayersForAdmin();

        return view('admin.players', $dataView);
    }

    /*
     * Route('/admin/players/delete/{id}', methods="POST")
     */
    public function delete(int $id, Request $request): RedirectResponse
    {
        $this->checkIsValidAdmin($request);
        $result = $this->deletePlayerAction->handle($id);

        return redirect()->route('players')->with($result);
    }

    private function checkIsValidAdmin(Request $request): void
    {
        $token = $request->user()->attributesToArray()['api_token'];
        $user = $this->userModel->getUserByToken($token);
        $this->checkUserOnAdmin($user);
    }

}
