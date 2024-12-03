<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalRecord extends Model
{
    use HasFactory;

    protected $fillable = ['id_diagnosis'];

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'id_diagnosis');
    }
}
