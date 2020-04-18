<?php

namespace src\Tags\Application\UseCases\GetAllFromMongoDB;

use src\Tag\Domain\Repositories\TagRepository;

class GetAllFromMongoDBCommandHandler
{
    /**
     * @var TagRepository
     */
    private $tagRepository;

    /**
     * GetAllFromMongoDBCommandHandler constructor.
     *
     * @param TagRepository $tagRepository
     */
    public function __construct(
        TagRepository $tagRepository
    )
    {
        $this->tagRepository = $tagRepository;
    }

    public function handle()
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->get('http://localhost:3000/tags');
        $tags = $res->getBody()->getContents();

        $uniqueTags = $this->tagRepository->removeRepeated(json_decode($tags));

        $this->tagRepository->save($uniqueTags);

        return true;

    }
}