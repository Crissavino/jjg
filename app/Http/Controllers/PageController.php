<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $games = Game::inRandomOrder()->take(180)->get();

//        $firstNineGames = $games->take(9);
//        $firstTwelveGames = $games->skip(115)->take(12);
//        $secondTwelveGames = $games->skip(127)->take(12);

        return view('pages.index2', [
            'games'             => $games,
//            'firstNineGames'    => $firstNineGames,
//            'firstTwelveGames'  => $firstTwelveGames,
//            'secondTwelveGames' => $secondTwelveGames,
        ]);
    }

    public function showGame()
    {
        $gameId = request()->id;
        $game = Game::find($gameId);

        return view('pages.game', [
            'game' => $game,
        ]);
    }
}
