<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Modules\Lk\Readers\LkReader;
use Illuminate\Http\Request;

class LkController extends Controller
{
    private LkReader $lkReader;

    public function __construct(
        LkReader $lkReader,
    ) {
        $this->lkReader = $lkReader;
    }

    /*
     * Route('/personal_account', method="GET")
     */
    public function index(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $tmp2 =
        $tmp = $request->session();
        $dataView = $this->lkReader->getDataForLk($user);
        return view('personalAcount', $dataView);
    }

}
