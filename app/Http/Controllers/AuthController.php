<?php

namespace App\Http\Controllers;

use App\Actions\StoreUsersAction;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function account()
    {
        return view('auth.account');
    }

    public function register_store(StoreUsersRequest $request, StoreUsersAction $storeUsers)
    {
        $user = $storeUsers->store($request);

        Auth::login($user);

        return redirect()->route('index')->with([
            'success' => 'You have been successfully registered'
        ]);
    }

    public function login_store(LoginUserRequest $request)
    {
        if (Auth::attempt(['email' => $request->emailPlayerForLog, 'password' => $request->passwordForLog])){
            return redirect()->route('index')->with([
                'success' => 'login',
            ]);
        }
        else return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with([
            'success' => 'logout',
        ]);
    }
}
