<?php

namespace App\Modules\Admin\Dto;

final class AdminStatisticsDto
{
    public int $count_users;

    public int $count_players;

    public int $count_finished_games;

    public function __construct(int $count_users, int $count_players, int $count_finished_games)
    {
        $this->count_users = $count_users;
        $this->count_players = $count_players;
        $this->count_finished_games = $count_finished_games;
    }
}
