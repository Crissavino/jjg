<?php

namespace src\Tag\Infrastructure\Repositories;


use App\Models\SpanishTag;
use src\Tag\Domain\Repositories\TagRepository;

class EloquentTagRepository implements TagRepository
{

    public function save($tags)
    {
        foreach ($tags as $tag) {
            $tagDB = [
                'title' => $tag->title,
                'uniqueIds' => json_encode($tag->uniqueIds)
            ];
            SpanishTag::create($tagDB);
        }

        return true;
    }
}