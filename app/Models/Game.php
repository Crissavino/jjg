<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
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

    protected $table = 'games';

    use SoftDeletes;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
}
