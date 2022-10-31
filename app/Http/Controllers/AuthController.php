<?php

namespace App\Http\Controllers;

use App\Actions\StoreUsersAction;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function login()
    {
        return view('auth.login');
    }

    public function login_store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required','string','max:100'],
            'password' => ['required','string','min:8'],
        ]);

        if (Auth::attempt($credentials)){
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
