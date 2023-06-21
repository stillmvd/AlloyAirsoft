<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    /*
     * Route('login', method='GET')
     */
    public function index(): View
    {
        return view('auth.account');
    }

    public function check(Request $request): RedirectResponse
    {
        $apiurl = env('APP_URL') . '/login_check';

        $response = Http::post($apiurl, [
            'emailPlayerForLog' => $request->input('emailPlayerForLog'),
            'passwordForLog' => $request->input('passwordForLog'),
        ]);


        if ($response->ok()) {
            $result = $response->json();
        } else {

        }
    }

}
