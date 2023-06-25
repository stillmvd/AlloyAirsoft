<?php

namespace App\Modules\Admin\Readers;

use App\Models\User;
use App\Modules\Admin\Dto\AdminStatisticsDto;
use App\Modules\Admin\Dto\FinishedEventDto;
use App\Modules\Admin\Dto\NearbyEventDto;
use App\Modules\Game\Db\IGameDb;
use App\Modules\Game\Db\IGamePlayersDb;
use App\Modules\Player\Db\IPlayerDb;

final class AdminReaders
{
    private IGameDb $gameDb;
    private IPlayerDb $playerDb;
    private IGamePlayersDb $gamePlayersDb;
    private User $userModels;

    public function __construct(IGameDb $gameDb, IPlayerDb $playerDb, IGamePlayersDb $gamePlayersDb, User $userModels)
    {
        $this->gameDb = $gameDb;
        $this->playerDb = $playerDb;
        $this->gamePlayersDb = $gamePlayersDb;
        $this->userModels = $userModels;
    }

    public function getAllInfoForMainPage(): array
    {
        $nearbyGames = $this->gameDb->getNearbyGames();
        $finishedGames = $this->gameDb->getFinishedGames();
        $countPlayers = $this->playerDb->getCountPlayers();
        $countUsers = $this->userModels->getCountUsers();

        $nearbyEventsData = [];
        $finishedEventsData = [];
        $statistics = new AdminStatisticsDto(
            $countUsers,
            $countPlayers,
            $this->gameDb->getCountFinishedGames()
        );

        foreach ($nearbyGames as $game) {
            $nearbyEventsData[] = new NearbyEventDto(
                $game->name,
                $this->gamePlayersDb->getCountPlayerInGameById($game->id),
                $game->date
            );
        }

        foreach ($finishedGames as $game) {
            $finishedEventsData[] = new FinishedEventDto(
                $game->name,
                $this->gamePlayersDb->getCountPlayerInGameById($game->id),
                $game->date
            );
        }

        return [
            'nearbyEventsData' => $nearbyEventsData,
            'finishedEventsData' => $finishedEventsData,
            'statistic' => $statistics,
        ];
    }
}
