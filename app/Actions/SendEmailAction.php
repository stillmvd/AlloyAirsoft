<?php
namespace App\Actions;

use App\Mail\Mailing;
use Illuminate\Support\Facades\Mail;

class SendEmailAction
{
    /**
     * Отправляет сообщение на заданный email с задаными title и message
     *
     * @param string $email
     * @param string $title Заголовок письма
     * @param string $message Сообщение письма
     * @return void
     */
    public function handle(string $email, string $title, string $message)
    {
        Mail::to($email)->send(new Mailing([
            'title' => $title,
            'message' => $message,
        ]));
    }
}
