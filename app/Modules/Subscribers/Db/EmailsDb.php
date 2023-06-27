<?php

namespace App\Modules\Subscribers\Db;

use Illuminate\Support\Facades\DB;

class EmailsDb implements IEmailsDb
{
    public function getAllEmails(): array
    {
        return DB::table(self::TABLE)
            ->get()
            ->toArray();
    }

    public function getCountEmails(): int
    {
        return DB::table(self::TABLE)
            ->get()
            ->count();
    }
}
