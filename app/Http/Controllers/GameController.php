<?php

namespace App\Http\Controllers;

use App\Models\EnglishGame;
use App\Models\NoLanguageGame;
use App\Models\SpanishGame;
use src\Games\Application\UseCases\GetAllFromMongoDB\GetAllFromMongoDBCommandHandler;
use src\Games\Infrastructure\Repositories\EloquentGameRepository;

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

    public function edit()
    {
        $originUrl = request()->headers->get('referer');
        $gameId = intval(request()->id);

        if (strpos($originUrl, 'spanishGames')) {
            $game = SpanishGame::find($gameId);
            $language = 'es';
        }


        if (strpos($originUrl, 'englishGames')) {
            $game = EnglishGame::find($gameId)->get();
            $language = 'en';
        }

        if (strpos($originUrl, 'noLanguageGames')) {
            $game = NoLanguageGame::find($gameId)->get();
            $language = 'notDefined';
        }

        return view('dashboard.games.edit',
            [
                'game'     => $game,
                'language' => $language,
            ]
        );

    }

    public function update()
    {
        $gameId = request()->id;

        if (request()->language === 'es') {
            $game = SpanishGame::find($gameId);

        }

        if (request()->language === 'en') {
            $game = EnglishGame::find($gameId);

        }

        if (request()->language === 'notDefined') {
            $game = NoLanguageGame::find($gameId);

        }

        $data = [
            'title'       => request()->title,
            'iframe'      => request()->iframe,
            'description' => isset(request()->description) ? request()->description : null,
            'instruction' => isset(request()->instruction) ? request()->instruction : null,
            'mostPlayed'  => isset(request()->mostPlayed) ? request()->mostPlayed : null,
            'topRated'    => isset(request()->topRated) ? request()->topRated : null,
        ];

        $game->update($data);

        return redirect('dashboard/')->with('status', 'Juego actualizado');

    }
}
