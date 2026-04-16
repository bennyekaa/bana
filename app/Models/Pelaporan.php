<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_pelaporan';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = false;

    public function pelanggaran()
    {
        return $this->belongsTo(Pelanggaran::class, "id_kategori", "id");
    }

    public function menerima()
    {
        return $this->belongsTo(Pengguna::class, "penerima_laporan", "id");
    }

    public function catatan()
    {
        return $this->hasMany(Catatan::class, "id_lp", "id");
    }

    public function foto()
    {
        return $this->hasMany(Foto::class, "id_lp", "id");
    }
}
