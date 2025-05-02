<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    // Menentukan nama tabel yang akan digunakan
    protected $table = 'events';

    // Menentukan kolom yang bisa diisi mass-assignable
    protected $fillable = [
        'title',
        'description',
        'imageevent',
    ];
}
