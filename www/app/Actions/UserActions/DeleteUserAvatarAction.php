<?php

namespace App\Actions\UserActions;

use App\Models\User;
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
