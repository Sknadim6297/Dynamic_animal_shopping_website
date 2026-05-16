<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use HasFactory;

    protected $table = 'video_galleries';

    protected $fillable = [
        'pet_name',
        'pet_type',
        'video',
    ];
}
