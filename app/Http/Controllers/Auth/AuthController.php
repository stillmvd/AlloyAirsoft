<?php

namespace App\Http\Controllers\Auth;

use App\Actions\UserActions\StoreUsersAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use App\Http\Requests\StoreUsersRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * Возращает страничку логина
     *
     * @return View
     */
//    public function account(): View
//    {
//        return view('auth.account');
//    }
//
//    /**
//     * Возращает страничку регистрации
//     *
//     * @return View
//     */
//    public function register(): View
//    {
//        return view('auth.registration');
//    }

    /**
     * Регистрация
     *
     * @param StoreUsersRequest $request
     * @param StoreUsersAction $storeUsers Создает и сохраняет юзера
     *
     * @return RedirectResponse
     */
    public function register_store(StoreUsersRequest $request, StoreUsersAction $storeUsers): RedirectResponse
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
     * @return RedirectResponse
     */
    public function login_store(LoginUserRequest $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $request->input('emailPlayerForLog'), 'password' => $request->input('passwordForLog')]))
            return redirect()->route('index')->with([
                'success' => "You're in account",
            ]);
        else
            return redirect()->back()->with([
                'error' => "There is no account with such data",
            ]);
    }

    /**
     * Выход из аккаунта
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect()->route('index')->with([
            'success' => 'You leaved from account',
        ]);
    }
}
