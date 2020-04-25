<?php

namespace App\Http\Controllers;

use App\Models\EnglishGame;
use App\Models\Game;
use App\Models\NoLanguageGame;
use App\Models\SpanishGame;
use src\Games\Application\UseCases\GetAllFromMongoDB\GetAllFromMongoDBCommandHandler;
use src\Games\Application\UseCases\SaveAllLanguageGamesInGames\SaveAllLanguageGamesInGamesCommandHandler;
use src\Games\Application\UseCases\SaveRelationships\SaveRelationshipsCommandHandler;
use src\Games\Infrastructure\Repositories\EloquentGameRepository;
use src\Tag\Infrastructure\Repositories\EloquentTagRepository;

class GameController extends Controller
{
    public function getFromMongo()
    {

        $gameRepository = new EloquentGameRepository();

        $handler = (new GetAllFromMongoDBCommandHandler($gameRepository))->handle();

        if ($handler) {
            return response()->json([
                'Juegos guardados',
            ]);
        }

        return response()->json([
            'Error',
        ]);

    }

    public function saveInGames()
    {
        $gameRepository = new EloquentGameRepository();

        $handler = (new SaveAllLanguageGamesInGamesCommandHandler($gameRepository))->handle();

        if ($handler) {
            return response()->json([
                'Juegos guardados',
            ]);
        }

        return response()->json([
            'Error',
        ]);
    }

    public function saveRelationships()
    {
        $gameRepository = new EloquentGameRepository();
        $tagRepository = new EloquentTagRepository();

        $handler = (new SaveRelationshipsCommandHandler($gameRepository, $tagRepository))->handle();

        if ($handler) {
            return response()->json([
                'Juegos guardados',
            ]);
        }

        return response()->json([
            'Error',
        ]);
    }

    public function addHttpsToIframes()
    {
        $games = Game::all();

        foreach ($games as $game) {
            $iframe = $game->iframe;
            $newIframe = str_replace("http","https",$iframe);

            $dataToUpdate = [
                'iframe' => $newIframe
            ];

            $game->update($dataToUpdate);
        }

        return response()->json([
            'Iframe actualizado',
        ]);
    }

    public function dashboardIndex()
    {
        $games = Game::paginate(10);

        $url = $games->url($games->currentPage()); // e.g. /some-url?page=1

        request()->session()->put('previousGamePage', $url);

        return view('dashboard.games.showGames',
            [
                'games'     => $games,
            ]
        );
    }

    public function edit()
    {
        $gameId = intval(request()->id);

        $game = Game::find($gameId);

        return view('dashboard.games.edit',
            [
                'game'     => $game,
            ]
        );

    }

    public function update()
    {

        $gameId = request()->id;
        $game = Game::find($gameId);

        $data = [
            'title'       => request()->title,
            'description' => isset(request()->description) ? request()->description : null,
            'instruction' => isset(request()->instruction) ? request()->instruction : null,
            'mostPlayed'  => isset(request()->mostPlayed) ? request()->mostPlayed : null,
            'topRated'    => isset(request()->topRated) ? request()->topRated : null,
        ];

        $game->update($data);

        return redirect(request()->session()->get('previousGamePage'))->with('status', 'Juego actualizado');

    }

    public function iframeError()
    {
        $gameId = request()->id;
        $game = Game::find($gameId);

        $game->update([
            'iframeError' => 1,
            'visible' => 0
        ]);

        return redirect(request()->session()->get('previousGamePage'))->with('status', 'Juego actualizado');
    }

    public function delete()
    {
        $gameId = request()->id;
        $game = Game::find($gameId);

        $game->delete();

        $mensaje = 'Juego archivado correctamente';

        return redirect(request()->session()->get('previousGamePage'))->with('status', $mensaje);

    }
}
