<?php
// app/Models/SectionThree.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $fillable = [
        'video_url',
        'video_title',
        'image1',
        'image1_caption',
        'image2',
        'image2_caption',
        'highlights',
    ];

    protected $casts = [
        'highlights' => 'array',
    ];
}

