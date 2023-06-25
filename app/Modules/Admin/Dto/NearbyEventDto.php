<?php

namespace App\Modules\Admin\Dto;

final class NearbyEventDto
{
    public string $game_name;

    public int $count_player;

    public string $game_date;

    public function __construct(string $game_name, int $count_player, string $game_date)
    {
        $this->game_name = $game_name;
        $this->count_player = $count_player;
        $this->game_date = $game_date;
    }
}
