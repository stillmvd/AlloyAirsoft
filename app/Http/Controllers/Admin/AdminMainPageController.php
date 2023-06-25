<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Contracts\View\View;
use App\Models\User;
use App\Modules\Admin\Readers\AdminReaders;
use Illuminate\Http\Request;

class AdminMainPageController extends BaseAdminController
{
    private User $userModel;
    private AdminReaders $adminReaders;

    public function __construct(User $userModel, AdminReaders $adminReaders)
    {
        parent::__construct();
        $this->userModel = $userModel;
        $this->adminReaders = $adminReaders;
    }

    /*
     * Route('/admin', method="GET")
     */
    public function index(Request $request): View
    {
        $this->checkIsValidAdmin($request);
        $dataView = $this->adminReaders->getAllInfoForMainPage();
        return view('admin.index', $dataView);
    }

    private function checkIsValidAdmin(Request $request): void
    {
        $token = $request->user()->attributesToArray()['api_token'];
        $user = $this->userModel->getUserByToken($token);
        $this->checkUserOnAdmin($user);
    }

}
