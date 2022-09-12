<?php
namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordAction
{
    /**
     * Обновляет пароль админа
     *
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function update(Request $request)
    {
        if(Hash::check($request->passwordOld, DB::table('users')->pluck('password')[0]))
        {
            DB::table('users')->update([
               'password' => Hash::make($request->passwordNew),
            ]);
            return true;
        }
    }
}
