<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactInformation extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'phone' => ['required'],
            'email' => ['required', 'email:rfc,dns']
        ];
    }
}
