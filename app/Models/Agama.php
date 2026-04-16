<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'ref_agama';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = false;
}
