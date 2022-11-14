<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteUserAvatarAction
{
    public function delete(int $id)
    {
        $path = User::find($id)->pathToAvatar;
        DB::table('users')->where('id', $id)->update(['pathToAvatar' => NULL]);
        Storage::delete($path);
    }
}