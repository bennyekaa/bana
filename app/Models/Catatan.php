<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table = 'data_catatan';
    //---Set Primary Key---
    protected $primaryKey = 'id';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'id_lp',
        'pertanyaan',
        'jawaban',
        'created_by'
    ];
}
