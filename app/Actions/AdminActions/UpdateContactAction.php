<?php

namespace App\Actions\AdminActions;

use App\Http\Requests\StoreContactInformation;
use Illuminate\Support\Facades\DB;

class UpdateContactAction
{
    /**
     * Обнавляет в базе данных contact email и phone
     *
     * @param App\Http\Request\StoreContactInformation $request
     * @return void
     */
    public function update(StoreContactInformation $request)
    {
        DB::table('contact')->update([
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
    }
}
