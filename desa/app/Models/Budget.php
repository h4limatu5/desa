<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budgets';

    protected $fillable = [
        'year',
        'category',
        'allocated',
        'spent',
        'description',
    ];

    protected $casts = [
        'allocated' => 'integer',
        'spent' => 'integer',
    ];
}
