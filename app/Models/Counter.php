<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Counter extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'counter_heading_1',
        'counter_number_1',
        'counter_heading_2',
        'counter_number_2',
        'counter_heading_3',
        'counter_number_3',
        'counter_heading_4',
        'counter_number_4',
    ];
}
