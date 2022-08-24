<?php

namespace App\Actions;

use Illuminate\Http\Request;

class getOldDataOfPlayer
{
    public function getData(Request $request)
    {
        $request->old('name');
        $request->old('surname');
        $request->old('callsign');
        $request->old('emailPlayer');
        $request->old('phone');
        $request->old('team');
    }
}
