<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpanishTag extends Model
{
    protected $fillable = [
        'title',
        'uniqueIds'
    ];

    use SoftDeletes;

    protected $table = 'spanish_tags';
}
