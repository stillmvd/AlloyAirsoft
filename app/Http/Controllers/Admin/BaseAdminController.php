<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class BaseAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function checkUserOnAdmin(User $user): bool|RedirectResponse
    {
        return !$user->isAdmin ?: redirect()->route('index');
    }

}
