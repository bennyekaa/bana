<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ref_pengguna';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';
    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class, "id_role", "id");
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class, "id_biodata", "id");
    }
}
