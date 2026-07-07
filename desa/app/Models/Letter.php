<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Letter extends Model
{
    use SoftDeletes;

    protected $table = 'letters';

    protected $fillable = [
        'resident_id',
        'user_id',
        'jenis_surat',
        'status',
        'nomor_surat',
        'tanggal_surat',
        'isi_data_json',
        'pdf_path',
        'rejected_reason',
        'approved_at',
        'rejected_at',
    ];

    protected $casts = [
        'isi_data_json' => 'array',
        'tanggal_surat' => 'date',
        'approved_at' => 'datetime',
        'rejected_at' => 'datetime',
    ];

    public function resident()
    {
        return $this->belongsTo(\App\Models\Resident::class);
    }
}

