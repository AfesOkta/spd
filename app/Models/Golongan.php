<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Golongan extends Model
{
    use HasFactory;
    public $table = 'golongan';
    protected $fillable = ['id_golongan', 'nama_golongan', 'golongan'];
    protected $primaryKey = 'id_golongan';
    public $timestamps = false;
}
