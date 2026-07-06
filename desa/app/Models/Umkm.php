<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = 'umkms';

    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'owner',
        'phone',
        'address',
        'image_path',
        'is_public',
    ];

    protected $casts = [
        'is_public' => 'boolean',
    ];
}
