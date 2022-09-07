<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlayerRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
