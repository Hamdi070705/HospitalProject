<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_obat', 
        'nama_obat', 
        'deskripsi', 
        'tipe_obat', 
        'stok', 
        'gambar_obat',
        'expiry_date'];

    public function diagnosis()
    {
        return $this->hasMany(Diagnosis::class, 'id_obat');
    }
}
