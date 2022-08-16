<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public $table = 'status';
    protected $fillable = ['id_status', 'nama_status'];
    protected $primaryKey = 'id_status';
    public $timestamps = false;
}
