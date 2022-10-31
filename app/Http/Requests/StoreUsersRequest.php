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
            'email' => ['required', 'email:rfc,dns', 'unique:users'],
            'password' => ['required', 'min:6', 'max:32'],
            'password_confirm' => ['min:6', 'max:32'],
        ];
    }
}
