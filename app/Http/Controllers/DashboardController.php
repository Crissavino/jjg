<?php

namespace App\Http\Controllers;

use App\Models\EnglishGame;
use App\Models\Game;
use App\Models\NoLanguageGame;
use App\Models\SpanishGame;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function showEnglishGames()
    {
        $englishGames = EnglishGame::paginate(20);

        return view('dashboard.EnglishGames.englishGames',
            [
                'englishGames' => $englishGames
            ]
        );
    }

    public function showSpanishGames()
    {
        $spanishGames = SpanishGame::paginate(20);

        return view('dashboard.SpanishGames.spanishGames',
            [
                'spanishGames' => $spanishGames
            ]
        );
    }
    public function showNoLanguageGames()
    {
        $noLanguageGames = NoLanguageGame::paginate(20);

        return view('dashboard.NoLanguageGames.noLanguageGames',
            [
                'noLanguageGames' => $noLanguageGames
            ]
        );
    }

    public function searchGames()
    {
        $search = request()->searchGame;
        if (!$search) {
            return view('dashboard.index');
        }

        $games = Game::where('title', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('dashboard.index',
            [
                'games' => $games,
            ]
        );

    }

    public function searchTags()
    {
        $search = request()->searchTag;
        if (!$search) {
            return view('dashboard.index');
        }

        $tags = Tag::where('title', 'LIKE', '%' . $search . '%')->paginate(10);

        return view('dashboard.index',
            [
                'tags' => $tags,
            ]
        );
    }
}
