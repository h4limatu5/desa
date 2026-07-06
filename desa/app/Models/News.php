<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'body',
        'published_at',
        'author',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];
}
