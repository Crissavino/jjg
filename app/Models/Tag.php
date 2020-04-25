<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    protected $fillable = [
        'title',
        'uniqueIds',
        'visible',
        'slug'
    ];

    use SoftDeletes;

    protected $table = 'tags';

    public function games()
    {
        return $this->belongsToMany('App\Models\Game');
    }

    public function scopeVisible($query, $visible = 1)
    {
        return $query->where('tags.visible', $visible);
    }

}
