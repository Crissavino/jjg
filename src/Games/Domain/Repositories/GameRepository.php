<?php

namespace src\Games\Domain\Repositories;

interface GameRepository
{
    public function getGamesSeparatedByLanguage($games): array;

    public function saveSpanishGame($game);

    public function saveNoLanguageGame($game);

    public function saveEnglishGame($game);
}