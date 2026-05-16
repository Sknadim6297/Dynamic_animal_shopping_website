<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'groomer_id',
        'pet_name',
        'pet_type',
        'owner_name',
        'email',
        'phone',
        'service_type',
        'appointment_date',
        'appointment_time',
        'appointment_reason',
        'special_instructions',
        'price_package',
        'status',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'appointment_date' => 'date',
    ];

    /**
     * Get the groomer that owns the appointment.
     */
    public function groomer()
    {
        return $this->belongsTo(Groomer::class);
    }

    /**
     * Get the grooming package for the appointment.
     */
    public function groomingPackage()
    {
        return $this->belongsTo(GroomingPackage::class, 'price_package', 'slug');
    }
}
