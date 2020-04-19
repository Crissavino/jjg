<?php

namespace src\Tag\Domain\Repositories;

interface TagRepository
{
    public function removeRepeated($tags);

    public function save($tags);

    public function getTags();

}