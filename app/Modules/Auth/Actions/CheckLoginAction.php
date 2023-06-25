<?php

namespace App\Modules\Auth\Actions;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

final class CheckLoginAction
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function handle(array $data, Request $request): RedirectResponse
    {
        if (Auth::attempt(['email' => $data['emailPlayerForLog'], 'password' => $data['passwordForLog']])) {
            $token = hash('sha256', Str::random(80));
            //to do, сделать через отдельный маршрут, и котроллер
            $request->user()->forceFill([
                'api_token' => $token
            ]);

            $userId = Auth::id();
            $this->userModel->setTokenById($userId, $token);
            $user = $this->userModel->getUserByToken($token);

            $dataRedirect = [
                'api_token' => $token,
                'success' => "You're in account",
            ];

            return $user->isAdmin
                ? redirect()
                    ->route('admin')
                    ->with($dataRedirect)
                : redirect()
                    ->route('personal_account')
                    ->with($dataRedirect);
        } else {
            return redirect()
                ->back()
                ->with([
                'error' => "There is no account with such data",
            ]);
        }
    }

}
