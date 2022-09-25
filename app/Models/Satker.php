<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;
    public $table = 'satker';
    protected $fillable = ['id_satker', 'nama_satker'];
    protected $primaryKey = 'id_satker';
    public $timestamps = false;
}
