<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EnglishGame extends Model
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

    protected $table = 'english_games';

    use SoftDeletes;
}
