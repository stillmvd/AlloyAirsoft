<?php
namespace App\Actions;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\DB;

class StoreEmailAction
{
    use DispatchesJobs;

    public function save($email) : void
    {
        DB::table('emails')->insert([
            'email' => $email,
            'created_at' => now(),
            'updated_at' => now()]
       );
    }
}
