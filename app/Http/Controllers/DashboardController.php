<?php

namespace App\Http\Controllers;

use App\Models\EnglishGame;
use App\Models\NoLanguageGame;
use App\Models\SpanishGame;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $englishGames = EnglishGame::paginate(20);
        $spanishGames = SpanishGame::paginate(20);
        $noLanguageGames = NoLanguageGame::paginate(20);

        return view('dashboard.index',
            [
                'englishGames' => $englishGames,
                'spanishGames' => $spanishGames,
                'noLanguageGames' => $noLanguageGames
            ]
        );
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
}
