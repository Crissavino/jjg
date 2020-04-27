<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tag;
use App\User;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getAllGames()
    {
        $games = Game::visible()->get();

        return response()->json([
            'games' => $games,
        ]);
    }

    public function getRelatedGames(Request $request)
    {
        $gameId = $request->gameId;
        $game = Game::find($gameId);

        $relatedGames = [];

        if ($game->tags->isNotEmpty()) {
            foreach ($game->tags as $tag) {
                $relatedGames[] = $tag->games;
            }
        }

        return response()->json([
            'game' => $game,
            'relatedGames' => $relatedGames
        ]);
    }

    public function favoritesGames(Request $request)
    {
        $userId = $request->userId;
        $user = User::find($userId);

        return response()->json([
            'user' => $user,
            'favorites' => $user->games,
        ]);
    }

    public function mostPlayed()
    {
        $games = Game::visible()->orderBy('numClicks', 'desc')->get();

        return response()->json([
            'games' => $games,
        ]);
    }

    public function recentPlayed()
    {
        $games = Game::visible()->whereNotNull('played')->orderBy('played', 'desc')->get();

        return response()->json([
            'games' => $games,
        ]);
    }

    public function recentPlayedByUser(Request $request)
    {
        $userId = $request->userId;
        $user = User::find($userId);
        $games = $user->played()->orderBy('played', 'desc')->get();

        return response()->json([
            'user' => $user,
            'games' => $games,
        ]);
    }

    public function topRated()
    {

    }

    public function indexGames()
    {
        $games = Game::visible()->inRandomOrder()->take(184)->get();

        return response()->json([
            'games' => $games,
        ]);
    }

    public function byCategory(Request $request)
    {
        $tagId = $request->tagId;
        $tag = Tag::find($tagId);
        $games = $tag->games()->orderBy('played', 'desc')->get();

        return response()->json([
            'tag' => $tag,
            'games' => $games,
        ]);
    }
}
