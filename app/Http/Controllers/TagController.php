<?php

namespace App\Http\Controllers;

use App\Models\SpanishTag;
use src\Tag\Infrastructure\Repositories\EloquentTagRepository;
use src\Tags\Application\UseCases\GetAllFromMongoDB\GetAllFromMongoDBCommandHandler;

class TagController extends Controller
{
    public function getFromMongo()
    {

        $tagRepository = new EloquentTagRepository();

        $handler = (new GetAllFromMongoDBCommandHandler($tagRepository))->handle();

        if ($handler) {
            return response()->json([
                'Tags guardados',
            ]);
        }

        return response()->json([
            'Error',
        ]);

    }

    public function dashboardIndex()
    {
        $spanishTags = SpanishTag::paginate(20);

        return view('dashboard.tags.showTags',
            [
                'spanishTags' => $spanishTags,
            ]
        );
    }
}
