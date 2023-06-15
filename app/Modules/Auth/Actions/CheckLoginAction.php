<?php

namespace App\Modules\Auth\Actions;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class CheckLoginAction
{
    public function handle(array $data, Request $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $data['emailPlayerForLog'], 'password' => $data['passwordForLog']])) {
            $token = hash('sha256', Str::random(80));
            //to do, сделать через отдельный маршрут, и котроллер
            $request->user()->forceFill([
                'api_token' => $token
            ]);
            return redirect()->route('index')->with(
                [
                    'api_token' => $token,
                    'success' => "You're in account",
                ]
            );
        } else {
            return redirect()->back()->with([
                'error' => "There is no account with such data",
            ]);
        }
    }

}
