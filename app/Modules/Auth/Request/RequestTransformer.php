<?php

namespace App\Modules\Auth\Request;

use App\Modules\Auth\Dto\SaveUserDto;
use App\Modules\Auth\Dto\UserDto;
use App\Modules\Auth\Validation\ValidatorBuilder;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

final class RequestTransformer
{
    private ValidatorBuilder $validatorBuilder;

    public function __construct(ValidatorBuilder $validatorBuilder)
    {
        $this->validatorBuilder = $validatorBuilder;
    }

    /**
     * @throws ValidationException
     */
    public function requestToSaveUser(Request $request): SaveUserDto
    {
        $notValidData = $request->all();
        $validData = $this->validatorBuilder->validateToUserRegister($notValidData);
        $userDto = new UserDto($validData['emailPlayerForReg'], $validData['passwordForReg']);
        return new SaveUserDto(
            $userDto,
            $validData['nameForReg'],
            $validData['surnameForReg'],
            $validData['callsignForReg'],
            $validData['numberForReg'],
        );
    }

    public function requestToCheckLogin(Request $request): array
    {
        $data = $request->all();
        return $this->validatorBuilder->validateToCheckLogin($data);
    }

}
