<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    public $table = 'pangkat';
    protected $fillable = ['id_pangkat', 'nama_pangkat', 'golongan'];
    protected $primaryKey = 'id_pangkat';
    public $timestamps = false;
}
