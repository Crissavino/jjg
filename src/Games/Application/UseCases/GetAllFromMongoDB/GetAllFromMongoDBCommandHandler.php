<?php
namespace src\Games\Application\UseCases\GetAllFromMongoDB;

use src\Games\Domain\Repositories\GameRepository;

class GetAllFromMongoDBCommandHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * GetAllFromMongoDBCommandHandler constructor.
     *
     * @param GameRepository $gameRepository
     */
    public function __construct(
        GameRepository $gameRepository
    ) {
        $this->gameRepository = $gameRepository;
    }

    public function handle(): bool
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get('http://localhost:3000/games');
        $games = $res->getBody()->getContents();

        [$englishGames, $spanishGames, $notLanguagesGames] = $this->gameRepository->getGamesSeparatedByLanguage($games);

        $seGuardo1 = $this->gameRepository->saveSpanishGame($spanishGames);
        $seGuardo2 = $this->gameRepository->saveEnglishGame($englishGames);
        $seGuardo3 = $this->gameRepository->saveNoLanguageGame($notLanguagesGames);

        if ($seGuardo1 && $seGuardo2 && $seGuardo3) {
            return true;
        }

        return false;
    }
}