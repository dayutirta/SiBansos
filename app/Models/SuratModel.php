<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SuratModel extends Model
{
    use HasFactory;

    // Specify the table associated with the model
    protected $table = 'm_surat';

    // Specify the primary key column
    protected $primaryKey = 'id_surat';

    // Specify which attributes should be mass-assignable
    protected $fillable = [
        'kode_surat',
        'nama_surat'
    ];

    public function pengujian(): HasMany{
        return $this->hasMany(PengajuanModel::class);
    }
}