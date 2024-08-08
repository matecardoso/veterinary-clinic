<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $dates = ['deleted_at'];

    const TYPE_ADMIN = 'admin';
    const TYPE_DOCTOR = 'doctor';
    const TYPE_RECEPTIONIST = 'receptionist';

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->type === self::TYPE_ADMIN;
    }

    public function isDoctor(): bool
    {
        return $this->type === self::TYPE_DOCTOR;
    }

    public function isReceptionist(): bool
    {
        return $this->type === self::TYPE_RECEPTIONIST;
    }

    public function isAppointmentDoctor(Appointment $appointment): bool
    {
        return $this->isDoctor() && $this->id === $appointment->doctor_id;
    }
}
