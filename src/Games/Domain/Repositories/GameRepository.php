<?php

namespace src\Games\Domain\Repositories;

interface GameRepository
{
    public function getGamesSeparatedByLanguage($games): array;

    public function saveSpanishGame($game);

    public function saveNoLanguageGame($game);

    public function saveEnglishGame($game);

    public function getSpanishGames();

    public function getEnglishGames();

    public function getNoLanguageGames();

    public function saveInGame($spanishGames, $englishGames, $noLanguageGames);

    public function getGames();

    public function saveRelationship($games, $tags);
}