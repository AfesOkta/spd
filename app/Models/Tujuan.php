<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tujuan extends Model
{
    use HasFactory;
    public $table = 'tujuan_perjalanan';
    protected $fillable = ['id_tujuan', 'nama_tujuan', 'uang_harian'];
    protected $primaryKey = 'id_tujuan';
    public $timestamps = false;
}
