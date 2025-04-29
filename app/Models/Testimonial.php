<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $fillable = [
        'layanan_id',
        'nama',
        'jabatan',
        'isi',
        'foto',
    ];

    public function layanan()
    {
        return $this->belongsTo(InformasiLayanan::class, 'layanan_id');
    }
}
