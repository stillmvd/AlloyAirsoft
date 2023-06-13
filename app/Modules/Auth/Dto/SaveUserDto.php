<?php

namespace App\Modules\Auth\Dto;

final class SaveUserDto
{
    public UserDto $userDto;

    public string $name;

    public string $surname;

    public string $callsign;

    public string $number;

    public function __construct(
        UserDto $userDto,
        string $name,
        string $surname,
        string $callsign,
        string $number,
    ) {
        $this->userDto = $userDto;
        $this->name = $name;
        $this->surname = $surname;
        $this->callsign = $callsign;
        $this->number = $number;
    }

}
