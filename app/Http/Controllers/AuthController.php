<?php

namespace App\Http\Controllers;

use App\Actions\StoreUsersAction;
use App\Http\Requests\StoreUsersRequest;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function register_store(StoreUsersRequest $request, StoreUsersAction $storeUsers)
    {
        $storeUsers->store($request);
        return redirect()->route('index');
    }
}
