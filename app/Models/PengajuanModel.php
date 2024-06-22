<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PengajuanModel extends Authenticatable
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'm_pengajuan';

    // Specify the primary key column
    protected $primaryKey = 'id_pengajuan';

    // Specify which attributes should be mass-assignable
    protected $fillable = [
        'id_warga',
        'id_surat',
        'ktp',
        'kk',
        'bukti_kepimilikan_rumah',
        'keterangan',
        'status'
    ];

    // Specify relationships
    public function warga()
    {
        return $this->belongsTo(WargaModel::class, 'id_warga', 'id_warga');
    }

    public function surat()
    {
        return $this->belongsTo(SuratModel::class, 'id_surat', 'id_surat');
    }
}
