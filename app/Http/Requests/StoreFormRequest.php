<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFormRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'callsign' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'max:20'],
            'team' => ['required'],
        ];
    }
}
