<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Modules\Game\Readers\GameReader;
use Illuminate\Contracts\View\View;

class GameController extends Controller
{
    private GameReader $gameReader;

    public function __construct(GameReader $gameReader)
    {
        $this->gameReader = $gameReader;
    }

    /**
     * Route('/game/{name}', GET)
     */
    public function index(string $game): View
    {
        return view('game', $this->gameReader->getGameByName($game));
    }

}
