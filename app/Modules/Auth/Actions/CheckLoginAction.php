<?php

namespace App\Modules\Auth\Actions;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

final class CheckLoginAction
{
    public function handle(array $data): JsonResponse|RedirectResponse
    {
        if (! $token = Auth::attempt([
            'email' => $data['emailPlayerForLog'],
            'password' => $data['passwordForLog']
        ])) {
            return response()->json(['error' => "There is no account with such data"], 401);
        }
        return createNewToken($token);
    }

}
