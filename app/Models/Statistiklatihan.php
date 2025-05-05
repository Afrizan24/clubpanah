<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatistikLatihan extends Model
{
    use HasFactory;

    protected $fillable = [
        'struktur_organisasi_id',
        'push_up',
        'tahan_nafas',
        'on_target',
        'off_target',
        'latihan_konsentrasi',
        'waktu_latihan',
    ];

    public function struktur()
    {
        return $this->belongsTo(StrukturOrganisasi::class, 'struktur_organisasi_id');
    }
}
