<?php

use Illuminate\Support\Facades\Route;

Route::get('personal_account/{id}', 'account')->middleware('auth')->name('personal_account');
Route::get('archive', 'archive')->name('archive');
Route::get('game/{name}', 'game')->name('game')->where(['name' => '[a-z]+']);
Route::post('game/{name}/prices', 'storePrice')->name('storePrice')->where(['name' => '[a-z]+']);
Route::post('game/saveReg/{id}', 'storePlayers')->name('store_players')->where(['id' => '[0-9]+']);
Route::post('game/save/{id}', 'storePlayerWithoutRegistarion')->name('storePlayerWithoutRegistarion')
    ->where(['id' => '[0-9]+']);


/**
 * Возвращает страницу архивных игр
 *
 * @param App\Actions\GetArchiveGamesAction $getArchiveGames Получает из actiona игры которые завершились
 * @return \Illuminate\View\View
 */
public function archive(GetArchiveGamesAction $getArchiveGames)
{
    return view('archive', $getArchiveGames->handle());
}

/**
 * Возращает страницу самой игры
 *
 * @param App\Actions\GetGameInfoAction $getGameInfo Получает из actiona информацию об игре
 * @param string $gameName Имя игры
 * @return Illuminate\View\View
 */
public function game(GetGameInfoAction $getGameInfo, string $gameName)
{
    return view('game', $getGameInfo->handle($gameName));
}

public function storePrice(string $gameName, Request $request, SetPriceForPlayerAction $setPriceForPlayer)
{
    $setPriceForPlayer->handle($request, $gameName);
    return redirect()->route('game', $gameName);
}

/**
 * Возращаем страницу аккаунта пользователя по его id
 *
 * @param int $id
 * @param App\Actions\GetInfoForAccountAction $getInfoForAccount получаем данные игрока
 *
 * @return Illuminate\View\View
 */
public function account(int $id, GetInfoForAccountAction $getInfoForAccount)
{
    return view('personalAcount', $getInfoForAccount->handle($id));
}

/**
 * Сохраняет информацию об игроке и отправляет информацию о игре ему на почту
 *
 * @param  App\Http\Request\StoreFormRequest $request Получает данные об игроке после валидации из request-а
 * @param  int $gameId ID игры в которой игрок зарегистрировался
 * @param  App\Actions\getOldDataOfPlayer $getOldData При неправильном заполнении полей получаем значения из предыдущего запроса
 * @param  App\Actions\StorePlayerAction $storePlayer Сохраняем игрока
 * @param  App\Actions\SendEmailAction $sendEmail Отправляем ему сообщение об успешной регистрации
 * @return Illuminate\Redirect\ Редиректим на страницу игры
 */
public function storePlayers(StoreFormRequest $request, int $gameId, getOldDataOfPlayer $getOldData,
                             StorePlayerAction $storePlayer, SendEmailAction $sendEmail)
{
    $gameName = Game::getNameById($gameId);
    $getOldData->handle($request);

    $storePlayer->handle($request, $gameId);
    $sendEmail->handle($request->emailPlayer,
        'Вы успешно заригистрировались на игру',
        'Вы успешно заригистрировались на игру');

    return redirect()->route('game', strtolower($gameName))->with(
        ['success' => 'You were registered for the game']
    );
}

/**
 * Регистрирует пользователя на игру если он уже есть как пользователь
 *
 * @param int $gameId id игры
 *
 * @return Illuminate\Redirect\
 */
public function storePlayerWithoutRegistarion(int $gameId)
{
    $storePlayer = new storePlayerWithoutRegistarionAction($gameId, Auth::user()->player->id);
    $storePlayer->handle();

    return redirect()->route('game', strtolower(Game::getNameById($gameId)));
}
