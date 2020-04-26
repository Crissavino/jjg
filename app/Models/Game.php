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
        'uniqueIds',
        'iframeError',
        'visible',
        'slug',
        'numClicks',
        'played'
    ];

    protected $table = 'games';

    use SoftDeletes;

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag');
    }

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function scopeVisible($query, $visible = 1)
    {
        return $query->where('games.visible', $visible);
    }

    public function played()
    {
        return $this->belongsToMany('App\User', 'played_user')->withTimestamps('created_at', 'updated_at');
    }

}
