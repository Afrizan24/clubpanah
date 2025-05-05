<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesan extends Model
{
    /** @use HasFactory<\Database\Factories\PesanFactory> */
    use HasFactory;

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama',
        'email',
        'pesan',
    ];
}
