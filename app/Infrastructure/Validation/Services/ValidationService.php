<?php

namespace App\Infrastructure\Validation\Services;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

final class ValidationService
{
    /**
     * @throws ValidationException
     */
    public function validate(array $notValidData, array $rules, array $attributes): RedirectResponse|array
    {
        $messages = include(dirname(__DIR__, 4) .'/app/Infrastructure/Validation/messages.php');
        $validator = Validator::make($notValidData, $rules, $messages, $attributes);
        $validatedData = $validator->validate();

        if ($validator->fails()) {
            return redirect()
                    ->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        return $validatedData;
    }

}
