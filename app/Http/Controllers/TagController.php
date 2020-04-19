<?php

namespace App\Http\Controllers;

use App\Models\SpanishTag;
use App\Models\Tag;
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
        $tags = Tag::paginate(20);

        return view('dashboard.tags.showTags',
            [
                'tags' => $tags,
            ]
        );
    }

    public function edit()
    {
        $originUrl = request()->headers->get('referer');
        $tagId = intval(request()->id);

        $tag = Tag::find($tagId);

        return view('dashboard.tags.edit',
            [
                'tag'     => $tag,
            ]
        );

    }

    public function update()
    {
        $tagId = intval(request()->id);
        $tag = Tag::find($tagId);

        $data = [
            'title'       => request()->title,
        ];

        $tag->update($data);

        return redirect('dashboard/')->with('status', 'Tag actualizado');

    }
}
