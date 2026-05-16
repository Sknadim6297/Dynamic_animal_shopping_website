<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAbout extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section_heading',
        'description',
        'year_of_experience',
        'right_heading_1',
        'right_description_1',
        'right_heading_2',
        'right_description_2',
        'right_heading_3',
        'right_description_3',
        'right_heading_4',
        'right_description_4',
    ];
}
