<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class RegisterController extends Controller
{
    /*
     * Route ('/registration', method='GET')
     */
    public function index(): View
    {
        return view('auth.registration');
    }
}
