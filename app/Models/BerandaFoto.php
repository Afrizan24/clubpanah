<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerandaFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'section',
        'gambar',
        'judul',
        'deskripsi'
    ];
} 