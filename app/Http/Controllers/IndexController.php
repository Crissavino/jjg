<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function show()
    {
        $games = Game::all()->chunk(9);

        return view('index', [
            'games' => $games
        ]);
    }
}
