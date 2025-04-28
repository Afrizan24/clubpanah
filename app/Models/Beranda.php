<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    /** @use HasFactory<\Database\Factories\BerandaFactory> */
    use HasFactory;

    protected $table = 'beranda_contents';

    protected $fillable = [
        'judul', 'deskripsi', 'gambar',
        'tentang_kami', 'judul_kegiatan', 'deskripsi_kegiatan',
        'gambar_galeri', 'alamat', 'google_maps', 'whatsapp'
    ];
}
