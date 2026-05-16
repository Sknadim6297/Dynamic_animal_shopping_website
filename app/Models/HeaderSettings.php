<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeaderSettings extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'address',
        'email',
        'phone',
        'social_text',
        'facebook_url',
        'twitter_url',
        'instagram_url',
        'logo_dark',
        'logo_white',
        'logo_footer',
    ];
}
