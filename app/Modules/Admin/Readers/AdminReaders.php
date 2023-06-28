<?php

namespace App\Modules\Admin\Readers;

use App\Models\User;
use App\Modules\Achievments\Db\IAchievementsDb;
use App\Modules\Admin\Dto\AdminStatisticsDto;
use App\Modules\Admin\Dto\FinishedEventDto;
use App\Modules\Admin\Dto\NearbyEventDto;
use App\Modules\Admin\Dto\PlayerForAdminDto;
use App\Modules\Game\Db\IGameDb;
use App\Modules\Game\Db\IGamePlayersDb;
use App\Modules\Player\Db\IPlayerDb;
use App\Modules\Subscribers\Db\IEmailsDb;
use App\Modules\Team\Db\ITeamDb;

final class AdminReaders
{
    private IGameDb $gameDb;
    private IPlayerDb $playerDb;
    private IGamePlayersDb $gamePlayersDb;
    private User $userModels;
    private IEmailsDb $emailsDb;

    public function __construct(
        IGameDb $gameDb,
        IPlayerDb $playerDb,
        IGamePlayersDb $gamePlayersDb,
        User $userModels,
        IEmailsDb $emailsDb,
    ) {
        $this->gameDb = $gameDb;
        $this->playerDb = $playerDb;
        $this->gamePlayersDb = $gamePlayersDb;
        $this->userModels = $userModels;
        $this->emailsDb = $emailsDb;
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

    public function getPlayersForAdmin(): array
    {
        $players = $this->playerDb->getAllPlayers();
        $emails = $this->emailsDb->getAllEmails();

        $playersDto = [];
        foreach ($players as $player) {
            $gamesNames = $this->gamePlayersDb->getGamesByPlayerId($player->id);
            $teamsName = 'Bandits';
            $playersDto[] = new PlayerForAdminDto(
                $player->id,
                $player->name !== null ? $player->name : '',
                $player->surname !== null ? $player->surname : '',
                $player->callsign !== null ? $player->callsign : '',
                $player->emailPlayer !== null ? $player->emailPlayer : '',
                $player->phone !== null ? $player->phone : '',
                $gamesNames,
                $teamsName,
                90
            );
        }


        return [
            'emails' => $emails,
            'players' => $playersDto,
        ];
    }

    public function getUsersForAdmin(): array
    {
        $users = $this->userModels->getAllUsers();
        $emails = $this->emailsDb->getAllEmails();

        return [
            'users' => $users,
            'emails' => $emails,
        ];
    }

}
