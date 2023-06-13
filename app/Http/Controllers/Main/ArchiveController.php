<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class ArchiveController extends Controller
{
    /**
     * Route('/archive', GET)
     */
    public function index(): View
    {
        return view('archive', []);
    }

}
