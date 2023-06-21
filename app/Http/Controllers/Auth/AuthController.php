<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\CheckLoginAction;
use App\Modules\Auth\Actions\SaveUserWithRegistrationAction;
use App\Modules\Auth\Request\RequestTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    private RequestTransformer $requestTransformer;
    private CheckLoginAction $checkLoginAction;
    private SaveUserWithRegistrationAction $saveUserWithRegistrationAction;

    public function __construct(
        RequestTransformer $requestTransformer,
        CheckLoginAction $checkLoginAction,
        SaveUserWithRegistrationAction $saveUserWithRegistrationAction
    ) {
        $this->middleware('auth:api', ['except' => ['login_check', 'register']]);
        $this->requestTransformer = $requestTransformer;
        $this->checkLoginAction = $checkLoginAction;
        $this->saveUserWithRegistrationAction = $saveUserWithRegistrationAction;
    }

    public function login_check(Request $request): JsonResponse|RedirectResponse
    {
        $dataForAuth = $this->requestTransformer->requestToCheckLogin($request);
        return $this->checkLoginAction->handle($dataForAuth);
    }

    /**
     * @throws ValidationException
     * Route ('/registration/save', method='POST')
     */
    public function register(Request $request): JsonResponse
    {
        $userDto = $this->requestTransformer->requestToSaveUser($request);
        $user = $this->saveUserWithRegistrationAction->handle($userDto);
        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user
        ], 201);
    }


    public function logout(): JsonResponse
    {
        auth()->logout();
        return response()->json(['message' => 'User successfully signed out']);
    }

    public function refresh(): JsonResponse
    {
        return createNewToken(auth()->refresh());
    }

    public function userProfile(): JsonResponse
    {
        return response()->json(auth()->user());
    }

}
