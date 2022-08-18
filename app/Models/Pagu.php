<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagu extends Model
{
    use HasFactory;
    public $table = 'pagu';
    protected $fillable = [
        'id_pagu',
        'akun',
        'pagu',
        'realisasi',
        'sisa',
        'ket',
    ];
    protected $primaryKey = 'id_pagu';
    public $timestamps = false;
}
