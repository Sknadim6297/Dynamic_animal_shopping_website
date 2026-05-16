<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groomer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'image',
        'name',
        'profession',
        'years_of_experience',
        'mobile_no',
        'experience_details',
        'skill_1',
        'skill_1_percentage',
        'skill_2',
        'skill_2_percentage',
        'skill_3',
        'skill_3_percentage',
        'no_of_cases_handled',
        'satisfied_clients',
    ];
}
