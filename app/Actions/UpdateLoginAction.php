<?php
namespace App\Actions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdateLoginAction
{
    /**
     * Обновляет логин админа, проверив его пароль
     *
     * @param Illuminate\Http\Request $request
     * @return void
     */
    public function update(Request $request)
    {
        if(Hash::check($request->password, DB::table('users')->pluck('password')[0]))
        {
            DB::table('users')->update([
               'login' => $request->login,
            ]);
            return true;
        }
    }
}
