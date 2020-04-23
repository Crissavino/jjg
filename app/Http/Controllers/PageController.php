<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $games = Game::inRandomOrder()->take(184)->get();

        return view('pages.index2', [
            'games'             => $games,
        ]);
    }

    public function showGame()
    {
        $gameId = request()->id;
        $game = Game::find($gameId);

        $relatedGames = [];

        while (count($relatedGames) < 10) {
            foreach ($game->tags as $tag) {
                $relatedGames[] = $tag->games()->inRandomOrder()->first();
            }
        }

        return view('pages.game', [
            'game' => $game,
            'relatedGames' => $relatedGames
        ]);
    }
}
