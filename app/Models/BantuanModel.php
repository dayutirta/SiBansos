<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BantuanModel extends Model
{
    use HasFactory;

    protected $table = 'm_bantuan'; 
    protected $primaryKey = 'id_bantuan';
    protected $fillable = ['kode_bantuan', 'nama_bantuan'];

    public function bansos(): HasMany{
        return $this->hasMany(BansosModel::class);
    }
}