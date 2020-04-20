<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        $games = Game::inRandomOrder()->take(152)->get();

        $firstNineGames = $games->take(9);
        $firstTwelveGames = $games->skip(115)->take(12);
        $secondTwelveGames = $games->skip(127)->take(12);

        return view('index', [
            'games' => $games,
            'firstNineGames' => $firstNineGames,
            'firstTwelveGames' => $firstTwelveGames,
            'secondTwelveGames' => $secondTwelveGames,
        ]);
    }
}
