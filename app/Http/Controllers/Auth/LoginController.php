<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Actions\CheckLoginAction;
use App\Modules\Auth\Request\RequestTransformer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private RequestTransformer $requestTransformer;
    private CheckLoginAction $checkLoginAction;

    public function __construct(
        RequestTransformer $requestTransformer,
        CheckLoginAction $checkLoginAction
    ) {
        $this->requestTransformer = $requestTransformer;
        $this->checkLoginAction = $checkLoginAction;
    }

    /*
     * Route('login', method='GET')
     */
    public function index(): View
    {
        return view('auth.account');
    }

    public function check(Request $request): RedirectResponse
    {
        $dataForAuth = $this->requestTransformer->requestToCheckLogin($request);
        return $this->checkLoginAction->handle($dataForAuth, $request);
    }

}
