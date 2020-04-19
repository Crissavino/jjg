<?php


namespace src\Games\Application\UseCases\SaveRelationships;


use src\Games\Domain\Repositories\GameRepository;
use src\Tag\Domain\Repositories\TagRepository;

class SaveRelationshipsCommandHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * SaveAllLanguageGamesInGamesCommand constructor.
     *
     * @param GameRepository $gameRepository
     * @param TagRepository  $tagRepository
     */
    public function __construct(
        GameRepository $gameRepository,
        TagRepository $tagRepository
    )
    {
        $this->gameRepository = $gameRepository;
        $this->tagRepository = $tagRepository;
    }

    public function handle()
    {
        $games = $this->gameRepository->getGames();
        $tags = $this->tagRepository->getTags();

        $chunkedGames = $games->chunk(2000);

        $this->gameRepository->saveRelationship($chunkedGames[2], $tags);

        return true;
    }

}