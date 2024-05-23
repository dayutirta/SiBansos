<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class WargaModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_warga';

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'id_level',
        'nokk',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'agama',
        'status',
        'kewarganegaraan',
        'pekerjaan',
        'pendidikan',
        'status_pernikahan',
    ];

    public function level()
    {
        return $this->belongsTo(LevelModel::class, 'id_level', 'id_level');
    }
}
