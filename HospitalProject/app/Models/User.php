<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string'
        ];
    }

    public function servicesGroup()
    {
        return $this->hasMany(ServicesGroup::class, 'id_user');
    }

    public function servicesLists()
    {
        return $this->hasMany(ServicesList::class, 'id_dokter');
    }

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'dokter_id');
    }

    public function feedback()
    {
        return $this->hasMany(Feedback::class, 'patient_id');
    }

    public function services()
    {
        return $this->hasMany(ServicesList::class, 'id_dokter');
    }

    public function schedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'dokter_id');
    }
}