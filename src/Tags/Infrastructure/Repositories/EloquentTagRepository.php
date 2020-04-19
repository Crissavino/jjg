<?php

namespace src\Tag\Infrastructure\Repositories;


use App\Models\Tag;
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
            Tag::create($tagDB);
        }

        return true;
    }

    public function removeRepeated($tags)
    {
        foreach ($tags as $key => $tag) {
            $tags[$key]->title = trim($tag->title);
            $conv = [
                'á' => 'a',
                'é' => 'e',
                'í' => 'i',
                'ó' => 'o',
                'ú' => 'u'
            ];

            $tags[$key]->title = strtr($tag->title, $conv);
        }

        /** flip it to keep the last one instead of the first one **/
        $uniques = array_reverse($tags);

        /** Answer Code begins here **/

        // Build temporary array for array_unique
        $tmp = array();
        foreach($uniques as $key => $tag)
            $tmp[$key] = $tag->title;

        // Find duplicates in temporary array
        $tmp = array_unique($tmp);

        // Remove the duplicates from original array
        foreach($uniques as $key => $tag) {
            if (!array_key_exists($key, $tmp)) {
                unset($uniques[$key]);
            } else {

            }
        }

        foreach ($uniques as $key => $unique) {
            foreach ($tags as $tag) {
                if ($unique->title == $tag->title && $unique->_id != $tag->_id) {
                    foreach ($tag->uniqueIds as $uniqueId) {
                        $unique->uniqueIds[] = $uniqueId;
                    }
                }
            }
        }

        /** Answer Code ends here **/
        /** flip it back now to get the original order **/
        return array_reverse($uniques);

    }
}