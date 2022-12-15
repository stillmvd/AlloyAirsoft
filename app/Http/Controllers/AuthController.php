<?php

namespace App\Http\Controllers;

use App\Actions\StoreUsersAction;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Возращает страничку логина
     *
     * @return \Illuminate\View\View
     */
    public function account()
    {
        return view('auth.account');
    }

    /**
     * Возращает страничку логина
     *
     * @return \Illuminate\View\View
     */
    public function register()
    {
        return view('auth.registration');
    }

    /**
     * Регистрация
     *
     * @param App\Http\Request\StoreUsersRequest $request
     * @param App\Actions\StoreUsersAction $storeUsers Создает и сохраняет юзера
     *
     * @return Illuminate\Redirect\
     */
    public function register_store(StoreUsersRequest $request, StoreUsersAction $storeUsers)
    {
        $user = $storeUsers->handle($request);

        Auth::login($user);

        return redirect()->route('index')->with([
            'success' => 'You have been successfully registered'
        ]);
    }

    /**
     * Логин
     *
     * @param LoginUserRequest $request
     *
     * @return Illuminate\Redirect\
     */
    public function login_store(LoginUserRequest $request)
    {
        if (Auth::attempt(['email' => $request->emailPlayerForLog, 'password' => $request->passwordForLog]))
            return redirect()->route('index')->with([
                'success' => "You're in account",
            ]);
        else return redirect()->back();
    }

    /**
     * Выход из аккаунта
     *
     * @return Illuminate\Redirect\
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index')->with([
            'success' => 'You leaved from account',
        ]);
    }
}
