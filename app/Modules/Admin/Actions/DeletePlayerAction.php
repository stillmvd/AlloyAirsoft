<?php

namespace App\Modules\Admin\Actions;

use App\Modules\Player\Db\IPlayerDb;

final class DeletePlayerAction
{
    private IPlayerDb $playerDb;

    public function __construct(IPlayerDb $playerDb)
    {
        $this->playerDb = $playerDb;
    }

    public function handle(int $id): array
    {
        $nameDelete = $this->playerDb->deletePlayerById($id);

        return [
            'success' => 'Players "' . $nameDelete . '(' . $id . ')' . '" was successfully deleted'
        ];
    }

}
