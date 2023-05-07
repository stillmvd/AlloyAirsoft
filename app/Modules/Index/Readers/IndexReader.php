<?php

namespace App\Modules\Index\Readers;

use App\Infrastructure\config\ConfigPaths;
use App\Models\Game;
use App\Modules\Config\Service\ConfigService;

final class IndexReader
{
    private Game $gameModel;
    private ConfigService $configService;

    public function __construct(Game $gameModel, ConfigService $configService)
    {
        $this->gameModel = $gameModel;
        $this->configService = $configService;
    }

    public function getAllDataForIndex(): array
    {
        $contactsConfig = $this->configService->getConfig(ConfigPaths::CONTACTS, 'contacts');
        return [
            'games' => $this->gameModel::getGames(),
            'games_count' => $this->gameModel::getCountGames(),
            'phone' => $contactsConfig['phone'],
            'email' => $contactsConfig['email'],
        ];
    }

}
