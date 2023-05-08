<?php

namespace App\Modules\Game\Readers;

use App\Infrastructure\config\ConfigPaths;
use App\Models\Game;
use App\Models\Team;
use App\Modules\Config\Service\ConfigService;
use App\Modules\Game\Db\IInfoDb;
use App\Modules\Game\Db\IPriceDb;
use App\Modules\Game\Db\IRuleDb;

final class GameReader
{
    private IInfoDb $infoDb;
    private IRuleDb $ruleDb;
    private IPriceDb $priceDb;
    private ConfigService $configService;

    public function __construct(
        IInfoDb $infoDb,
        IRuleDb $ruleDb,
        IPriceDb $priceDb,
        ConfigService $configService
    ) {
        $this->infoDb = $infoDb;
        $this->ruleDb = $ruleDb;
        $this->priceDb = $priceDb;
        $this->configService = $configService;
    }

    public function getGameByName(string $name): array
    {
        if(Game::hasGame($name))
        {
            $gameId = Game::getIdByName($name);
            $contactsConfig = $this->configService->getConfig(ConfigPaths::CONTACTS, 'contacts');

            $tmp = [
                'game' => Game::find($gameId),

                'infos' => $this->infoDb->getInfosByGameId($gameId)[0],
                'rules' => $this->ruleDb->getRulesByGameId($gameId),
                'prices' => $this->priceDb->getPricesByGameId($gameId),
                'teams' => Team::getTeams(),
                'teams_count' => Team::getCountTeams(),

                'phone' => $contactsConfig['phone'],
                'email' => $contactsConfig['email'],
            ];

            return $tmp;
        }
        return [];
    }

}
