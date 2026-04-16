<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ref_pelanggaran';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = false;

    public function kategori_pelanggaran()
    {
        return $this->belongsTo(KategoriPelanggaran::class, "id_kategori_pelanggaran", "id");
    }
}
