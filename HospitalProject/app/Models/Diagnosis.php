<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosis extends Model
{
    use HasFactory;

    protected $table = 'diagnosis';

    protected $fillable = ['diagnosis_code', 'diagnosis_date', 'id_obat', 'riwayat_penyakit', 'tindakan_medis', 'description'];

    public function medicine()
    {
        return $this->belongsTo(Medicine::class, 'id_obat');
    }

    public function servicesGroup()
    {
        return $this->hasMany(ServicesGroup::class, 'id_diagnosis');
    }

    public function medicalRecord()
    {
        return $this->hasOne(MedicalRecord::class, 'id_diagnosis');
    }
}
