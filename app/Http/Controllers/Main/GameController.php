<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Modules\Game\Actions\SavePriceForPlayerAction;
use App\Modules\Game\Readers\GameReader;
use App\Modules\Game\Request\RequestTransformer;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    private GameReader $gameReader;
    private RequestTransformer $requestTransformer;
    private SavePriceForPlayerAction $savePriceForPlayerAction;

    public function __construct(
        GameReader $gameReader,
        RequestTransformer $requestTransformer,
        SavePriceForPlayerAction $savePriceForPlayerAction
    ) {
        $this->gameReader = $gameReader;
        $this->requestTransformer = $requestTransformer;
        $this->savePriceForPlayerAction = $savePriceForPlayerAction;
    }

    /**
     * Route('/game/{name}', GET)
     */
    public function index(string $game): RedirectResponse|View
    {
        $dataView = $this->gameReader->getGameByName($game);
        if ($dataView == []) {
            return redirect()->route('index');
        }
        return view('game', $dataView);
    }

    /**
     * Route('/game/{name}/prices', POST)
     */
    public function registerPlayerInGame(Request $request, string $name): RedirectResponse
    {
        $data = $this->requestTransformer->validateDataForRegisterInGame($request, $name);
        $this->savePriceForPlayerAction->execute($data, $name);
        return redirect()->route('game', strtolower($name))->with(
            ['success' => 'You were registered for the game']
        );
    }

}
