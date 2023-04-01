<?php

namespace App\Http\Controllers\Main;

use Exception;
use Illuminate\Contracts\View\View;
use App\Actions\MainActions\SendEmailAction;
use App\Actions\MainActions\StoreEmailAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEmailRequest;
use MainReaders;


class MainController extends Controller
{
    private MainReaders $mainReaders;

    public function __construct(MainReaders $mainReaders)
    {
        $this->mainReaders = $mainReaders;
    }

    /**
     * @throws Exception
     */
    public function index(): View
    {
        $dataView = $this->mainReaders->getGamesForMainPage();
        return view('index', $dataView);
    }


    public function saveEmail(StoreEmailRequest $request,
                              StoreEmailAction $storeEmail, SendEmailAction $sendEmail)
    {
        $request->old('email');
        if(isExistsDB($request->email))
        {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        }
        else
        {
            $storeEmail->handle($request->email);
            $sendEmail->handle($request->email,
                    'Регистрация на игру',
                    'Вы успешно зарегистрировались на игру');

            return redirect()->back()->with(
                ['success' => 'You have been subscribed to the newsletter!']
            );
        }
    }
}
