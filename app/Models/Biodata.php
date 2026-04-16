<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ref_biodata';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, "id_pangkat", "id");
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, "id_jabatan", "id");
    }
}
