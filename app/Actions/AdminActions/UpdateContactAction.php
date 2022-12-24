<?php

namespace App\Actions\AdminActions;

use App\Http\Requests\StoreContactInformation;
use Illuminate\Support\Facades\DB;

class UpdateContactAction
{
    /**
     * Обнавляет в базе данных contact email и phone
     *
     * @param StoreContactInformation $request
     * @return void
     */
    public function update(StoreContactInformation $request): void
    {
        DB::table('contact')->update([
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
        ]);
    }
}
