<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $table = 'struktur_organisasis';

    protected $fillable = [
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'alamat',
        'jabatan',
        'keahlian',
        'divisi',
        'foto',
        'tanggal_bergabung',
    ];
    public function statistikLatihans()
    {
        return $this->hasMany(StatistikLatihan::class);
    }
}
    