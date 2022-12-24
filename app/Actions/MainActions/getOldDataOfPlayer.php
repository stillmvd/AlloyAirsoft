<?php

namespace App\Actions\MainActions;

use Illuminate\Http\Request;

class getOldDataOfPlayer
{
    public function handle(Request $request): void
    {
        $request->old('name');
        $request->old('surname');
        $request->old('callsign');
        $request->old('emailPlayer');
        $request->old('phone');
        $request->old('team');
    }
}
