<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesGroup extends Model
{
    use HasFactory;

    protected $table = 'services_group';

    protected $fillable = ['id_services', 'id_user', 'id_diagnosis', 'status', 'tanggal_periksa'];

    public function service()
    {
        return $this->belongsTo(ServicesList::class, 'id_services');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function diagnosis()
    {
        return $this->belongsTo(Diagnosis::class, 'id_diagnosis');
    }
}
