<?php

namespace App\Modules\Admin\Actions;

use App\Models\User;

final class DeleteUserAction
{
    private User $userModel;

    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function handle(int $id): array
    {
        $emailDelete = $this->userModel->deleteUserById($id);

        return [
            'success' => 'User "' . $emailDelete . '(' . $id . ')' . '" was successfully deleted'
        ];
    }
}
