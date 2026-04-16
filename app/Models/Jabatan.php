<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ref_jabatan';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = false;
}
