<?php

namespace App\Modules\Auth\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;

final class CheckLoginAction
{
    public function handle(array $data): RedirectResponse
    {
        if ($token = Auth::attempt([
                'email' => $data['emailPlayerForLog'],
                'password' => $data['passwordForLog']
            ])) {

            return redirect()->route('index')
                ->with(json_encode([
                    'success' => "You're in account",
                    'access_token' => $token,
                    'token_type' => 'bearer',
                    'expires_in' => auth()->factory()->getTTL() * 60,
                    'user' => auth()->user()
                ]));
        } else {
            return redirect()->back()->with([
                'error' => "There is no account with such data",
            ]);
        }
    }

//        'access_token' => $token,
//        'token_type' => 'bearer',
//        'expires_in' => auth()->factory()->getTTL() * 60,
//        'user' => auth()->user()
}
