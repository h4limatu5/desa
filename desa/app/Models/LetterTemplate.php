<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LetterTemplate extends Model
{
    protected $table = 'letter_templates';

    protected $fillable = [
        'jenis_surat',
        'name',
        'template_content',
    ];

    public function letters()
    {
        return $this->hasMany(\App\Models\Letter::class, 'jenis_surat', 'jenis_surat');
    }
}


