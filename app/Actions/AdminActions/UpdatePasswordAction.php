<?php
namespace App\Actions\AdminActions;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UpdatePasswordAction
{
    /**
     * Обновляет пароль админа
     *
     * @param Request $request
     * @return bool
     */
    public function update(Request $request): bool
    {
        if(Hash::check($request->input('passwordOld'), DB::table('users')->pluck('password')[0]))
        {
            DB::table('users')->update([
               'password' => Hash::make($request->input('passwordNew')),
            ]);
            return true;
        }
        return false;
    }
}
