<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAbout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'main_heading',
        'main_heading_highlight',
        'main_description',
        'years_of_experience',
        'video_url',
        'how_we_work_label',
        'vision_image',
        'vision_heading',
        'vision_description',
        'mission_image',
        'mission_heading',
        'mission_description',
        'why_choose_image',
        'why_choose_heading',
        'why_choose_phone_label',
        'why_choose_community_text',
        'why_choose_items',
        'callout_description',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'why_choose_items' => 'array',
    ];
}
