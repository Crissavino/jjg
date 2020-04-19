<?php


namespace src\Games\Application\UseCases\SaveAllLanguageGamesInGames;


use src\Games\Domain\Repositories\GameRepository;

class SaveAllLanguageGamesInGamesCommandHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * SaveAllLanguageGamesInGamesCommand constructor.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(
        GameRepository $gameRepository
    )
    {
        $this->gameRepository = $gameRepository;
    }

    public function handle()
    {
        $spanishGames = $this->gameRepository->getSpanishGames();
        $englishGames = $this->gameRepository->getEnglishGames();
        $noLanguageGames = $this->gameRepository->getNoLanguageGames();

        $this->gameRepository->saveInGame($spanishGames, $englishGames, $noLanguageGames);

        return true;
    }
}