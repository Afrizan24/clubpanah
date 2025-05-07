<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles'; // Pastikan sesuai dengan nama tabel di database

    protected $fillable = [
        'logo',
        'description',
    ];

    public function layanan()
{
    return $this->hasMany(Layanan::class);
}
}
