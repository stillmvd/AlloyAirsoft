<?php

namespace App\Modules\Auth\Validation;

use App\Infrastructure\Validation\Services\ValidationService;
use Illuminate\Validation\ValidationException;

final class ValidatorBuilder
{
    private ValidationService $validationService;

    public function __construct(ValidationService $validationService)
    {
        $this->validationService = $validationService;
    }

    /**
     * @throws ValidationException
     */
    public function validateToUserRegister(array $data): array
    {
        $ruleText = 'required|string|min:0|max:26';

        $rules = [
            'emailPlayerForReg' => 'required|email:rfc,dns',
            'passwordForReg' => [
                'required',
                'min:6',
                'regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            ],
            'nameForReg' => $ruleText,
            'surnameForReg' => $ruleText,
            'callsignForReg' => $ruleText,
            'numberForReg' => ['required', 'regex:/^\+?(\d{1,3})?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/']
        ];

        $labels = [
            'emailPlayerForReg' => 'Email',
            'passwordForReg' => 'Password',
            'nameForReg' => 'Name',
            'surnameForReg' => 'Surname',
            'callsignForReg' => 'Callsign',
            'numberForReg' => 'Number',
        ];

        return $this->validationService->validate($data, $rules, $labels);
    }
}
