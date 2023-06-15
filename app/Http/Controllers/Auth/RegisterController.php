<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\SaveUserWithRegistrationAction;
use App\Modules\Auth\Request\RequestTransformer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class RegisterController extends Controller
{
    private RequestTransformer $requestTransformer;
    private SaveUserWithRegistrationAction $saveUserWithRegistrationAction;

    public function __construct(
        RequestTransformer $requestTransformer,
        SaveUserWithRegistrationAction $saveUserWithRegistrationAction
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->saveUserWithRegistrationAction = $saveUserWithRegistrationAction;
    }

    /*
     * Route ('/registration', method='GET')
     */
    public function index(): View
    {
        return view('auth.registration');
    }

    /**
     * @throws ValidationException
     * Route ('/registration/save', method='POST')
     */
    public function save(Request $request): RedirectResponse
    {
        $userDto = $this->requestTransformer->requestToSaveUser($request);
        $token = $this->saveUserWithRegistrationAction->handle($userDto);
        return redirect()->route('personal_account')->with(
            [
            'api_token' => $token,
            'success' => 'You have been successfully registered'
            ]
        );
    }

}
