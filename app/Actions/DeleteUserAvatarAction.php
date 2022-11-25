<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteUserAvatarAction
{
    public function handle(int $id)
    {
        $path = User::find($id)->pathToAvatar;
        User::find($id)->update(['pathToAvatar' => NULL]);
        Storage::delete($path);
    }
}
