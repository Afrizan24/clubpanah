<?php

// app/Models/InformasiLayanan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformasiLayanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul', 'deskripsi', 'hari_jam', 'biaya', 'lokasi', 'kontak',
    ];
}
