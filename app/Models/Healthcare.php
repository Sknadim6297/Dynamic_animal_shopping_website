<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Healthcare extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section_heading_main',
        'image_1',
        'image_2',
        'heading_1',
        'heading_2',
        'description_1',
        'description_2',
        'doctor_image',
        'doctor_name',
        'skill_1',
        'skill_1_percentage',
        'skill_2',
        'skill_2_percentage',
        'skill_3',
        'skill_3_percentage',
    ];
}
