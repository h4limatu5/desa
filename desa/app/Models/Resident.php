<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    /** @use HasFactory<\Database\Factories\ResidentFactory> */
    use HasFactory;

    protected $table = 'residents';

    protected $fillable = [
        'nik',
        'kk',
        'nama_lengkap',
        'tanggal_lahir',
        'jenis_kelamin',
        'nomor_hp',
        'alamat',
        'rt',
        'rw',
        'desa',
        'status_perkawinan',
        'status_warga',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function letters()
    {
        return $this->hasMany(\App\Models\Letter::class);
    }
}


