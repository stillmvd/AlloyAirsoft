<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'emailPlayerForReg' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'passwordForReg' => ['required', 'min:6', 'max:32'],
        ];
    }
}
