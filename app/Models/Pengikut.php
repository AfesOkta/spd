<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengikut extends Model
{
    use HasFactory;
    public $table = 'pengikut';
    protected $fillable = ['id_pengikut', 'id_spd', 'nrp', 'lama_hari'];
    protected $primaryKey = 'id_pengikut';
    public $timestamps = false;

    public function spd(){
        return $this->hasOne(Spd::class, 'id_spd', 'id_spd');
    }

    public function personel(){
        return $this->hasOne(Personel::class, 'nrp', 'nrp');
    }

}
