<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['hari'];

    public function doctorSchedules()
    {
        return $this->hasMany(DoctorSchedule::class, 'schedule_id');
    }
}
