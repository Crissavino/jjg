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
        $tags = Tag::paginate(10);

        $url = $tags->url($tags->currentPage()); // e.g. /some-url?page=1
        request()->session()->put('previousPage', $url);

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

        return redirect(request()->session()->get('previousTagPage'))->with('status', 'Tag actualizado');

    }

    public function delete()
    {
        $tagId = request()->id;
        $tag = Tag::find($tagId);

        $tag->delete();

        $mensaje = 'Tag archivado correctamente';

        return redirect('dashboard/tag')->with('status', $mensaje);

    }
}
