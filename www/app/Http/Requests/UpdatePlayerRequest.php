<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
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
