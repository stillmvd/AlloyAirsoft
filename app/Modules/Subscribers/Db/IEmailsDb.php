<?php

namespace App\Modules\Subscribers\Db;

interface IEmailsDb
{
    const TABLE = 'emails';

    public function getAllEmails(): array;

    public function getCountEmails(): int;
}
