<?php

namespace App\Modules\Auth\Dto;

final class UserDto
{
    public string $email;

    public string $password;

    public function __construct(
        string $email,
        string $password
    ) {
        $this->email = $email;
        $this->password = $password;
    }
}
