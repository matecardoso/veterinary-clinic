<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'person_name', 
        'email', 
        'pet_name', 
        'animal_type', 
        'age', 
        'symptoms', 
        'appointment_date', 
        'day_period', 
        'doctor_id',
        'receptionist_id'
    ];

    protected $dates = ['deleted_at'];

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class, 'receptionist_id');
    }
}
