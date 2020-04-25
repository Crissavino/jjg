<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $games = Game::visible()->inRandomOrder()->take(184)->get();

        return view('pages.index2', [
            'games' => $games,
        ]);
    }

    public function showGame()
    {
        $gameSlug = request()->slug;
        $game = Game::where('slug', $gameSlug)->first();

        $relatedGames = [];

        if ($game->tags->isNotEmpty()) {
            foreach ($game->tags as $tag) {
                while (count($relatedGames) < 10) {
                    $relatedGames[] = $tag->games()->inRandomOrder()->first();
                }
            }
        }

        return view('pages.game', [
            'game'         => $game,
            'relatedGames' => $relatedGames,
        ]);
    }

    public function showCategory()
    {
        $tagSlug = request()->slug;
        $tag = Tag::where('slug', $tagSlug)->first();

        $games = $tag->games()->paginate(56);

        return view('pages.category', [
            'tag'         => $tag,
            'games' => $games,
        ]);
    }
}
