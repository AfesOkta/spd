<?php

namespace App\Models;

use App\Traits\ModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory, ModelTrait;
    public $table = 'biaya_spd';
    protected $fillable = ['id', 'nama_kegiatan', 'biaya', 'created_by', 'updated_by'];
    protected $primaryKey = 'id';
    protected $hidden =['created_at','updated_at'];
    public $timestamps = false;
}
