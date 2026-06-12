<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfPenyidikan extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'pdf_penyidikan';

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'id_lp',
        'file',
        'created_by'
    ];

    public function pelaporan()
    {
        return $this->belongsTo(
            Pelaporan::class,
            'id_lp',
            'id'
        );
    }
}
