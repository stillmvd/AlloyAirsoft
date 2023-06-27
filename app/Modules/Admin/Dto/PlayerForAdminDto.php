<?php

namespace App\Modules\Admin\Dto;

final class PlayerForAdminDto
{
    public int $id;

    public string $name;

    public string $surname;

    public string $callsign;

    public string $email;

    public string $phone;

    public array $games_names;

    public string $team_name;

    public int $price;

    public function __construct(
        int $id,
        string $name,
        string $surname,
        string $callsign,
        string $email,
        string $phone,
        array $games_names,
        string $team_name,
        int $price
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->callsign = $callsign;
        $this->email = $email;
        $this->phone = $phone;
        $this->games_names = $games_names;
        $this->team_name = $team_name;
        $this->price = $price;
    }
}
