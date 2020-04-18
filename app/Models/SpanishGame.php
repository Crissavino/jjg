<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpanishGame extends Model
{

    protected $fillable = [
        'title',
        'iframe',
        'description',
        'instruction',
        'mostPlayed',
        'topRated',
        'tags_ids',
        'uniqueIds'
    ];

    use SoftDeletes;

    protected $table = 'spanish_games';

}
