<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class BansosModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_bansos';

    protected $primaryKey = 'id_bansos';

    protected $fillable = [
        'id_bantuan',
        'nama_program',
        'tanggal_mulai',
        'tanggal_akhir',
        'jumlah_penerima',
        'anggaran',
        'lokasi',
    ];

    public function bantuan()
    {
        return $this->belongsTo(BantuanModel::class, 'id_bantuan', 'id_bantuan');
    }
}
