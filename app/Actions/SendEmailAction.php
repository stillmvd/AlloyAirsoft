<?php
namespace App\Actions;

use App\Http\Requests\StoreFormRequest;
use App\Mail\Mailing;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Support\Facades\Mail;

class SendEmailAction
{
    use DispatchesJobs;

    public function send(String $email, String $title, String $message): void
    {
        Mail::to($email)->send(new Mailing([
            'title' => $title,
            'message' => $message,
        ]));
    }
}
