<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    protected $table = 'complaints';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'category',
        'photo_path',
        'status',
        'response',
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
