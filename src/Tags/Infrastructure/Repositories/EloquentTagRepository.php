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

    public function removeRepeated($tags)
    {

        /** flip it to keep the last one instead of the first one **/
        $array = array_reverse($tags);

        /** Answer Code begins here **/

        // Build temporary array for array_unique
        $tmp = array();
        foreach($array as $k => $v)
            $tmp[$k] = $v->title;

        // Find duplicates in temporary array
        $tmp = array_unique($tmp);

        // Remove the duplicates from original array
        foreach($array as $k => $v) {
            if (!array_key_exists($k, $tmp))
                unset($array[$k]);
        }

        /** Answer Code ends here **/
        /** flip it back now to get the original order **/
        return array_reverse($array);

    }
}