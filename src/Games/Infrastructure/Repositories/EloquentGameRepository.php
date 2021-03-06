<?php

namespace src\Games\Infrastructure\Repositories;

use App\Models\EnglishGame;
use App\Models\Game;
use App\Models\NoLanguageGame;
use App\Models\SpanishGame;
use LanguageDetection\Language;
use src\Games\Domain\Repositories\GameRepository;

class EloquentGameRepository implements GameRepository
{

    public function getGamesSeparatedByLanguage($games): array
    {
        $ld = new Language;
        $gamesObject = json_decode($games);
        $englishGames = [];
        $spanishGames = [];
        $notLanguagesGames = [];
        foreach ($gamesObject as $game) {
            $language = $ld->detect($game->description)->bestResults()->close();

            if (isset($language['es']) && isset($language['en'])) {
                if ($language['es'] > $language['en']) {
                    $spanishGames[] = $game;
                } else {
                    $englishGames[] = $game;
                }
            }

            // si el lenguaje es ingles
            if (isset($language['en']) && !isset($language['es'])) {
                $englishGames[] = $game;
            }

            // si el lenguaje es espanol
            if (!isset($language['en']) && isset($language['es'])) {
                $spanishGames[] = $game;
            }

            if (!isset($language['en']) && !isset($language['es'])) {
                $notLanguagesGames[] = $game;
            }
        }

        return [
            $englishGames,
            $spanishGames,
            $notLanguagesGames
        ];
    }

    public function saveSpanishGame($arrayOfGames)
    {
        foreach ($arrayOfGames as $gameDB) {
            $game = [
                'title' => $gameDB->title,
                'iframe' => $gameDB->iframe,
                'description' => isset($gameDB->description) ? $gameDB->description : null,
                'instruction' => isset($gameDB->instruction) ? $gameDB->instruction : null,
                'mostPlayed' => isset($gameDB->mostPlayed) ? $gameDB->mostPlayed : null,
                'topRated' => isset($gameDB->topRated) ? $gameDB->topRated : null,
                'tags_ids' => json_encode($gameDB->tags_ids),
                'uniqueIds' => json_encode($gameDB->uniqueIds)
            ];
            SpanishGame::create($game);
        }

        return true;
    }

    public function saveNoLanguageGame($arrayOfGames)
    {
        foreach ($arrayOfGames as $gameDB) {
            $game = [
                'title' => $gameDB->title,
                'iframe' => $gameDB->iframe,
                'description' => isset($gameDB->description) ? $gameDB->description : null,
                'instruction' => isset($gameDB->instruction) ? $gameDB->instruction : null,
                'mostPlayed' => isset($gameDB->mostPlayed) ? $gameDB->mostPlayed : null,
                'topRated' => isset($gameDB->topRated) ? $gameDB->topRated : null,
                'tags_ids' => json_encode($gameDB->tags_ids),
                'uniqueIds' => json_encode($gameDB->uniqueIds)
            ];
            NoLanguageGame::create($game);
        }

        return true;
    }

    public function saveEnglishGame($arrayOfGames)
    {
        foreach ($arrayOfGames as $gameDB) {
            $game = [
                'title' => $gameDB->title,
                'iframe' => $gameDB->iframe,
                'description' => isset($gameDB->description) ? $gameDB->description : null,
                'instruction' => isset($gameDB->instruction) ? $gameDB->instruction : null,
                'mostPlayed' => isset($gameDB->mostPlayed) ? $gameDB->mostPlayed : null,
                'topRated' => isset($gameDB->topRated) ? $gameDB->topRated : null,
                'tags_ids' => json_encode($gameDB->tags_ids),
                'uniqueIds' => json_encode($gameDB->uniqueIds)
            ];
            EnglishGame::create($game);
        }

        return true;
    }

    public function getSpanishGames()
    {
        return SpanishGame::all();
    }

    public function getEnglishGames()
    {
        return EnglishGame::all();
    }

    public function getNoLanguageGames()
    {
        return NoLanguageGame::all();
    }

    public function saveInGame($spanishGames, $englishGames, $noLanguageGames)
    {
        foreach ($spanishGames as $game) {
            $array = $game->toArray();
            unset($array['id']);
            Game::create($array);
        }

        foreach ($englishGames as $game) {
            $array = $game->toArray();
            unset($array['id']);
            Game::create($array);
        }

        foreach ($noLanguageGames as $game) {
            $array = $game->toArray();
            unset($array['id']);
            Game::create($array);
        }

    }

    public function getGames()
    {
        return Game::all();
    }

    public function saveRelationship($games, $tags)
    {
        foreach ($games as $game) {
            $gameTagsIds = json_decode($game->tags_ids);
            foreach ($gameTagsIds as $tagId) {
                foreach ($tags as $tag) {
                    $uniquesTagsIds = json_decode($tag->uniqueIds);
                    if (in_array($tagId, $uniquesTagsIds)) {
                        $game->tags()->attach($tag->id);
                    }
                }
            }
        }
    }
}