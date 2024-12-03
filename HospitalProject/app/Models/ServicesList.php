<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicesList extends Model
{
    use HasFactory;

    protected $table = 'services_list';

    protected $fillable = ['nama_layanan', 'id_dokter', 'deskripsi'];

    public function servicesGroup()
    {
        return $this->hasMany(ServicesGroup::class, 'id_services');
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
