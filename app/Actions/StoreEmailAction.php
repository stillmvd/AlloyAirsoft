<?php
namespace App\Actions;

use Illuminate\Support\Facades\DB;

class StoreEmailAction
{
/**
 * Сохраняет в базе данных переданный email
 *
 * @param string $email
 * @return void
 */
    public function saveEmail(string $email)
    {
        DB::table('emails')->insert([
            'email' => $email,
            'created_at' => now(),
            'updated_at' => now()]
       );
    }
}
