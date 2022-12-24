<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'alpha', 'max:20'],
            'surname' => ['required', 'alpha', 'max:20'],
            'callsign' => ['required', 'alpha', 'max:20'],
            'emailPlayer' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'max:20'],
            'team_id' => ['required'],
        ];
    }
}
