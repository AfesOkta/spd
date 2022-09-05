<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    use HasFactory;
    public $table = 'personel';
    protected $fillable = ['nrp', 'nama_personel', 'jabatan', 'id_pangkat', 'id_golongan', 'id_satker', 'id_status', 'is_deleted'];
    protected $primaryKey = 'nrp';
    public $timestamps = false;

    public function pangkat(){
        return $this->hasOne(Pangkat::class, 'id_pangkat', 'id_pangkat');
    }
    public function satker(){
        return $this->hasOne(Satker::class, 'id_satker', 'id_satker');
    }
    public function status(){
        return $this->hasOne(Status::class, 'id_status', 'id_status');
    }
    
}
