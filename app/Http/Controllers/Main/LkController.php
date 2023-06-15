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
    public function index(Request $request)
    {
        //to do ВОТ ЭТОТ КРИНЖ НАДО ПЕРЕПИСАТЬ))))
        $token = $request->user()->attributesToArray()['api_token'];
        $dataView = $this->lkReader->getDataForLk($token);
        return view('personalAcount', $dataView);
    }

}
